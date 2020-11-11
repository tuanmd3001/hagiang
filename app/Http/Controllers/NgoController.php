<?php

namespace App\Http\Controllers;

use App\DataTables\NgoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNgoRequest;
use App\Http\Requests\UpdateNgoRequest;
use App\Repositories\NgoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NgoController extends AppBaseController
{
    /** @var  NgoRepository */
    private $ngoRepository;

    public function __construct(NgoRepository $ngoRepo)
    {
        $this->ngoRepository = $ngoRepo;
    }

    /**
     * Display a listing of the Ngo.
     *
     * @param NgoDataTable $ngoDataTable
     * @return Response
     */
    public function index(NgoDataTable $ngoDataTable)
    {
        return $ngoDataTable->render('ngos.index');
    }

    /**
     * Show the form for creating a new Ngo.
     *
     * @return Response
     */
    public function create()
    {
        return view('ngos.create');
    }

    /**
     * Store a newly created Ngo in storage.
     *
     * @param CreateNgoRequest $request
     *
     * @return Response
     */
    public function store(CreateNgoRequest $request)
    {
        $input = $request->all();

        $ngo = $this->ngoRepository->create($input);

        Flash::success('Ngo saved successfully.');

        return redirect(route('ngos.index'));
    }

    /**
     * Display the specified Ngo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ngo = $this->ngoRepository->find($id);

        if (empty($ngo)) {
            Flash::error('Ngo not found');

            return redirect(route('ngos.index'));
        }

        return view('ngos.show')->with('ngo', $ngo);
    }

    /**
     * Show the form for editing the specified Ngo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ngo = $this->ngoRepository->find($id);

        if (empty($ngo)) {
            Flash::error('Ngo not found');

            return redirect(route('ngos.index'));
        }

        return view('ngos.edit')->with('ngo', $ngo);
    }

    /**
     * Update the specified Ngo in storage.
     *
     * @param  int              $id
     * @param UpdateNgoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNgoRequest $request)
    {
        $ngo = $this->ngoRepository->find($id);

        if (empty($ngo)) {
            Flash::error('Ngo not found');

            return redirect(route('ngos.index'));
        }

        $ngo = $this->ngoRepository->update($request->all(), $id);

        Flash::success('Ngo updated successfully.');

        return redirect(route('ngos.index'));
    }

    /**
     * Remove the specified Ngo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ngo = $this->ngoRepository->find($id);

        if (empty($ngo)) {
            Flash::error('Ngo not found');

            return redirect(route('ngos.index'));
        }

        $this->ngoRepository->delete($id);

        Flash::success('Ngo deleted successfully.');

        return redirect(route('ngos.index'));
    }
}
