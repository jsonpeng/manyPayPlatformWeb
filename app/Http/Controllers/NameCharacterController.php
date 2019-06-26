<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNameCharacterRequest;
use App\Http\Requests\UpdateNameCharacterRequest;
use App\Repositories\NameCharacterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NameCharacterController extends AppBaseController
{
    /** @var  NameCharacterRepository */
    private $nameCharacterRepository;

    public function __construct(NameCharacterRepository $nameCharacterRepo)
    {
        $this->nameCharacterRepository = $nameCharacterRepo;
    }

    /**
     * Display a listing of the NameCharacter.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nameCharacterRepository->pushCriteria(new RequestCriteria($request));
        $nameCharacters = $this->nameCharacterRepository->all();

        return view('name_characters.index')
            ->with('nameCharacters', $nameCharacters);
    }

    /**
     * Show the form for creating a new NameCharacter.
     *
     * @return Response
     */
    public function create()
    {
        return view('name_characters.create');
    }

    /**
     * Store a newly created NameCharacter in storage.
     *
     * @param CreateNameCharacterRequest $request
     *
     * @return Response
     */
    public function store(CreateNameCharacterRequest $request)
    {
        $input = $request->all();

        $nameCharacter = $this->nameCharacterRepository->create($input);

        Flash::success('Name Character saved successfully.');

        return redirect(route('nameCharacters.index'));
    }

    /**
     * Display the specified NameCharacter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nameCharacter = $this->nameCharacterRepository->findWithoutFail($id);

        if (empty($nameCharacter)) {
            Flash::error('Name Character not found');

            return redirect(route('nameCharacters.index'));
        }

        return view('name_characters.show')->with('nameCharacter', $nameCharacter);
    }

    /**
     * Show the form for editing the specified NameCharacter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nameCharacter = $this->nameCharacterRepository->findWithoutFail($id);

        if (empty($nameCharacter)) {
            Flash::error('Name Character not found');

            return redirect(route('nameCharacters.index'));
        }

        return view('name_characters.edit')->with('nameCharacter', $nameCharacter);
    }

    /**
     * Update the specified NameCharacter in storage.
     *
     * @param  int              $id
     * @param UpdateNameCharacterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNameCharacterRequest $request)
    {
        $nameCharacter = $this->nameCharacterRepository->findWithoutFail($id);

        if (empty($nameCharacter)) {
            Flash::error('Name Character not found');

            return redirect(route('nameCharacters.index'));
        }

        $nameCharacter = $this->nameCharacterRepository->update($request->all(), $id);

        Flash::success('Name Character updated successfully.');

        return redirect(route('nameCharacters.index'));
    }

    /**
     * Remove the specified NameCharacter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nameCharacter = $this->nameCharacterRepository->findWithoutFail($id);

        if (empty($nameCharacter)) {
            Flash::error('Name Character not found');

            return redirect(route('nameCharacters.index'));
        }

        $this->nameCharacterRepository->delete($id);

        Flash::success('Name Character deleted successfully.');

        return redirect(route('nameCharacters.index'));
    }
}
