<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\ClientRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientController extends AppBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Client.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRepository->pushCriteria(new RequestCriteria($request));
        $clients = $this->clientRepository->all();

        return view('admin.clients.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new Client.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param CreateClientRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();

        $client = $this->clientRepository->create($input);

        Flash::success('保存成功.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('admin.clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('admin.clients.edit')->with('client', $client);
    }

    /**
     * Update the specified Client in storage.
     *
     * @param  int              $id
     * @param UpdateClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $client = $this->clientRepository->update($request->all(), $id);

        Flash::success('保存成功.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $this->clientRepository->delete($id);

        Flash::success('删除成功.');

        return redirect(route('clients.index'));
    }
}
