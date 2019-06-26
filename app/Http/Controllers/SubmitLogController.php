<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubmitLogRequest;
use App\Http\Requests\UpdateSubmitLogRequest;
use App\Repositories\SubmitLogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;

class SubmitLogController extends AppBaseController
{
    /** @var  SubmitLogRepository */
    private $submitLogRepository;

    public function __construct(SubmitLogRepository $submitLogRepo)
    {
        $this->submitLogRepository = $submitLogRepo;
    }

    /**
     * Display a listing of the SubmitLog.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->submitLogRepository->pushCriteria(new RequestCriteria($request));

        $input = $request->all();
        $tools=varifyTools($input);
        $submitLogs = $this->submitLogRepository->model()::where('id','>',0)->where('pay_status','已支付');
        if(array_key_exists('name',$input)){
             $submitLogs=$submitLogs->where('name','like','%'.$input['name'].'%');
        }
        if(array_key_exists('start_time',$input) && !empty($input['start_time'])){
            $input['start_time'] = Carbon::parse($input['start_time'])->startOfDay();
            $submitLogs=$submitLogs->where('created_at','>=',$input['start_time']);
            $input['start_time'] = $input['start_time']->format('Y-m-d');
        }
        if(array_key_exists('end_time',$input) && !empty($input['end_time'])){
            $input['end_time'] = Carbon::parse($input['end_time'])->endOfDay();
            $submitLogs=$submitLogs->where('created_at','<',$input['end_time']);
            $input['end_time'] = $input['end_time']->format('Y-m-d');
        }
        $submitLogs = descAndPaginateToShow($submitLogs);

        return view('submit_logs.index')
            ->with('submitLogs', $submitLogs)
            ->with('input',$input)
            ->with('tools',$tools);
    }

     public function frame(Request $request)
    {
        $this->submitLogRepository->pushCriteria(new RequestCriteria($request));

        $input = $request->all();
        $tools=varifyTools($input);
        $submitLogs = $this->submitLogRepository->model()::where('id','>',0)->where('pay_status','已支付');
        if(array_key_exists('name',$input)){
             $submitLogs=$submitLogs->where('name','like','%'.$input['name'].'%');
        }
        if(array_key_exists('start_time',$input) && !empty($input['start_time'])){
            $input['start_time'] = Carbon::parse($input['start_time'])->startOfDay();
            $submitLogs=$submitLogs->where('created_at','>=',$input['start_time']);
            $input['start_time'] = $input['start_time']->format('Y-m-d');
        }
        if(array_key_exists('end_time',$input) && !empty($input['end_time'])){
            $input['end_time'] = Carbon::parse($input['end_time'])->endOfDay();
            $submitLogs=$submitLogs->where('created_at','<',$input['end_time']);
            $input['end_time'] = $input['end_time']->format('Y-m-d');
        }
        $submitLogs = descAndPaginateToShow($submitLogs);

        return view('submit_logs.frame')
            ->with('submitLogs', $submitLogs)
            ->with('input',$input)
            ->with('tools',$tools);
    }


    /**
     * Show the form for creating a new SubmitLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('submit_logs.create');
    }

    /**
     * Store a newly created SubmitLog in storage.
     *
     * @param CreateSubmitLogRequest $request
     *
     * @return Response
     */
    public function store(CreateSubmitLogRequest $request)
    {
        $input = $request->all();

        $submitLog = $this->submitLogRepository->create($input);

        Flash::success('Submit Log saved successfully.');

        return redirect(route('submitLogs.index'));
    }

    /**
     * Display the specified SubmitLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $submitLog = $this->submitLogRepository->findWithoutFail($id);

        if (empty($submitLog)) {
            Flash::error('Submit Log not found');

            return redirect(route('submitLogs.index'));
        }

        return view('submit_logs.show')->with('submitLog', $submitLog);
    }

    /**
     * Show the form for editing the specified SubmitLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $submitLog = $this->submitLogRepository->findWithoutFail($id);

        if (empty($submitLog)) {
            Flash::error('Submit Log not found');

            return redirect(route('submitLogs.index'));
        }

        return view('submit_logs.edit')->with('submitLog', $submitLog);
    }

    /**
     * Update the specified SubmitLog in storage.
     *
     * @param  int              $id
     * @param UpdateSubmitLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubmitLogRequest $request)
    {
        $submitLog = $this->submitLogRepository->findWithoutFail($id);

        if (empty($submitLog)) {
            Flash::error('Submit Log not found');

            return redirect(route('submitLogs.index'));
        }

        $submitLog = $this->submitLogRepository->update($request->all(), $id);

        Flash::success('Submit Log updated successfully.');

        return redirect(route('submitLogs.index'));
    }


    public function manyDeletes(Request $request){
        $input = $request->all();

        if(!is_array($input['attr_arr'])){
            $input['attr_arr'] = explode(',',$input['attr_arr']);
        }
       // dd($input['attr_arr']);
        $this->submitLogRepository->model()::whereIn('id',$input['attr_arr'])->delete();

        Flash::success('批量删除记录成功.');

        return redirect(route('submitLogs.index'));
    }

    /**
     * Remove the specified SubmitLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $submitLog = $this->submitLogRepository->findWithoutFail($id);

        if (empty($submitLog)) {
            Flash::error('Submit Log not found');

            return redirect(route('submitLogs.index'));
        }

        $this->submitLogRepository->delete($id);

        Flash::success('Submit Log deleted successfully.');

        return redirect(route('submitLogs.index'));
    }
}
