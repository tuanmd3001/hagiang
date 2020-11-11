<?php

namespace App\Http\Controllers;

use App\DataTables\DuAnNgoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDuAnNgoRequest;
use App\Http\Requests\UpdateDuAnNgoRequest;
use App\Repositories\DuAnNgoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DuAnNgoController extends AppBaseController
{
    /** @var  DuAnNgoRepository */
    private $duAnNgoRepository;

    public function __construct(DuAnNgoRepository $duAnNgoRepo)
    {
        $this->duAnNgoRepository = $duAnNgoRepo;
    }

    /**
     * Display a listing of the DuAnNgo.
     *
     * @param DuAnNgoDataTable $duAnNgoDataTable
     * @return Response
     */
    public function index(DuAnNgoDataTable $duAnNgoDataTable)
    {
        return $duAnNgoDataTable->render('du_an_ngos.index');
    }

    /**
     * Show the form for creating a new DuAnNgo.
     *
     * @return Response
     */
    public function create()
    {
        return view('du_an_ngos.create');
    }

    /**
     * Store a newly created DuAnNgo in storage.
     *
     * @param CreateDuAnNgoRequest $request
     *
     * @return Response
     */
    public function store(CreateDuAnNgoRequest $request)
    {
        $input = $request->all();

        $duAnNgo = $this->duAnNgoRepository->create($input);

        Flash::success('Du An Ngo saved successfully.');

        return redirect(route('duAnNgos.index'));
    }

    /**
     * Display the specified DuAnNgo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $duAnNgo = $this->duAnNgoRepository->find($id);

        if (empty($duAnNgo)) {
            Flash::error('Du An Ngo not found');

            return redirect(route('duAnNgos.index'));
        }

        return view('du_an_ngos.show')->with('duAnNgo', $duAnNgo);
    }

    /**
     * Show the form for editing the specified DuAnNgo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $duAnNgo = $this->duAnNgoRepository->find($id);

        if (empty($duAnNgo)) {
            Flash::error('Du An Ngo not found');

            return redirect(route('duAnNgos.index'));
        }

        return view('du_an_ngos.edit')->with('duAnNgo', $duAnNgo);
    }

    /**
     * Update the specified DuAnNgo in storage.
     *
     * @param  int              $id
     * @param UpdateDuAnNgoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDuAnNgoRequest $request)
    {
        $duAnNgo = $this->duAnNgoRepository->find($id);

        if (empty($duAnNgo)) {
            Flash::error('Du An Ngo not found');

            return redirect(route('duAnNgos.index'));
        }

        $duAnNgo = $this->duAnNgoRepository->update($request->all(), $id);

        Flash::success('Du An Ngo updated successfully.');

        return redirect(route('duAnNgos.index'));
    }

    /**
     * Remove the specified DuAnNgo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $duAnNgo = $this->duAnNgoRepository->find($id);

        if (empty($duAnNgo)) {
            Flash::error('Du An Ngo not found');

            return redirect(route('duAnNgos.index'));
        }

        $this->duAnNgoRepository->delete($id);

        Flash::success('Du An Ngo deleted successfully.');

        return redirect(route('duAnNgos.index'));
    }
}
