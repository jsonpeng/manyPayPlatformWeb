<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNameSetRequest;
use App\Http\Requests\UpdateNameSetRequest;
use App\Repositories\NameSetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\NameCharacter;

class NameSetController extends AppBaseController
{
    /** @var  NameSetRepository */
    private $nameSetRepository;

    public function __construct(NameSetRepository $nameSetRepo)
    {
        $this->nameSetRepository = $nameSetRepo;
    }

    /**
     * Display a listing of the NameSet.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nameSetRepository->pushCriteria(new RequestCriteria($request));
        $nameSets = descAndPaginateToShow($this->nameSetRepository);

        return view('name_sets.index')
            ->with('nameSets', $nameSets);
    }

    /**
     * Show the form for creating a new NameSet.
     *
     * @return Response
     */
    public function create()
    {
        return view('name_sets.create')
                ->with('characters',characterAll())
                ->with('selectedCharacters',[]);
    }

    /**
     * Store a newly created NameSet in storage.
     *
     * @param CreateNameSetRequest $request
     *
     * @return Response
     */
    public function store(CreateNameSetRequest $request)
    {
        $input = $request->all();

        $nameSet = $this->nameSetRepository->create($input);

        $this->syncCharacter($nameSet,$input);

        Flash::success('添加成功.');

        return redirect(route('nameSets.index'));
    }

    //为姓氏附带性格
    private function syncCharacter($nameSet,$input=[]){
         #先清除
        NameCharacter::where('name_id',$nameSet->id)->delete();
        if(array_key_exists('character',$input)){
            #然后加
            $characters = $input['character'];
            foreach ($characters as $key => $value) {
                NameCharacter::create(['name_id'=>$nameSet->id,'character'=>$value]);
            }
        }
    }

    /**
     * Display the specified NameSet.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nameSet = $this->nameSetRepository->findWithoutFail($id);

        if (empty($nameSet)) {
            Flash::error('Name Set not found');

            return redirect(route('nameSets.index'));
        }

        return view('name_sets.show')->with('nameSet', $nameSet);
    }

    /**
     * Show the form for editing the specified NameSet.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nameSet = $this->nameSetRepository->findWithoutFail($id);

        if (empty($nameSet)) {
            Flash::error('Name Set not found');

            return redirect(route('nameSets.index'));
        }

        return view('name_sets.edit')->with('nameSet', $nameSet);
    }

    /**
     * Update the specified NameSet in storage.
     *
     * @param  int              $id
     * @param UpdateNameSetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNameSetRequest $request)
    {
        $nameSet = $this->nameSetRepository->findWithoutFail($id);

        if (empty($nameSet)) {
            Flash::error('Name Set not found');

            return redirect(route('nameSets.index'));
        }
        
        $input = $request->all();

        $nameSet = $this->nameSetRepository->update($input, $id);

        $this->syncCharacter($nameSet,$input);

        Flash::success('更新成功.');

        return redirect(route('nameSets.index'));
    }

    /**
     * Remove the specified NameSet from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nameSet = $this->nameSetRepository->findWithoutFail($id);

        if (empty($nameSet)) {
            Flash::error('Name Set not found');

            return redirect(route('nameSets.index'));
        }

        $this->nameSetRepository->delete($id);

        $this->syncCharacter($nameSet);

        Flash::success('删除成功.');

        return redirect(route('nameSets.index'));
    }
}
