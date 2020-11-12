<?php

namespace App\Http\Controllers;

use App\DataTables\DnVonNuocNgoaiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDnVonNuocNgoaiRequest;
use App\Http\Requests\UpdateDnVonNuocNgoaiRequest;
use App\Repositories\DnVonNuocNgoaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DnVonNuocNgoaiController extends AppBaseController
{
    /** @var  DnVonNuocNgoaiRepository */
    private $dnVonNuocNgoaiRepository;

    public function __construct(DnVonNuocNgoaiRepository $dnVonNuocNgoaiRepo)
    {
        $this->dnVonNuocNgoaiRepository = $dnVonNuocNgoaiRepo;
    }

    /**
     * Display a listing of the DnVonNuocNgoai.
     *
     * @param DnVonNuocNgoaiDataTable $dnVonNuocNgoaiDataTable
     * @return Response
     */
    public function index(DnVonNuocNgoaiDataTable $dnVonNuocNgoaiDataTable)
    {
        return $dnVonNuocNgoaiDataTable->render('dn_von_nuoc_ngoais.index');
    }

    /**
     * Show the form for creating a new DnVonNuocNgoai.
     *
     * @return Response
     */
    public function create()
    {
        return view('dn_von_nuoc_ngoais.create');
    }

    /**
     * Store a newly created DnVonNuocNgoai in storage.
     *
     * @param CreateDnVonNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function store(CreateDnVonNuocNgoaiRequest $request)
    {
        $input = $request->all();

        $dnVonNuocNgoai = $this->dnVonNuocNgoaiRepository->create($input);

        Flash::success('Dn Von Nuoc Ngoai saved successfully.');

        return redirect(route('dnVonNuocNgoais.index'));
    }

    /**
     * Display the specified DnVonNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dnVonNuocNgoai = $this->dnVonNuocNgoaiRepository->find($id);

        if (empty($dnVonNuocNgoai)) {
            Flash::error('Dn Von Nuoc Ngoai not found');

            return redirect(route('dnVonNuocNgoais.index'));
        }

        return view('dn_von_nuoc_ngoais.show')->with('dnVonNuocNgoai', $dnVonNuocNgoai);
    }

    /**
     * Show the form for editing the specified DnVonNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dnVonNuocNgoai = $this->dnVonNuocNgoaiRepository->find($id);

        if (empty($dnVonNuocNgoai)) {
            Flash::error('Dn Von Nuoc Ngoai not found');

            return redirect(route('dnVonNuocNgoais.index'));
        }

        return view('dn_von_nuoc_ngoais.edit')->with('dnVonNuocNgoai', $dnVonNuocNgoai);
    }

    /**
     * Update the specified DnVonNuocNgoai in storage.
     *
     * @param  int              $id
     * @param UpdateDnVonNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDnVonNuocNgoaiRequest $request)
    {
        $dnVonNuocNgoai = $this->dnVonNuocNgoaiRepository->find($id);

        if (empty($dnVonNuocNgoai)) {
            Flash::error('Dn Von Nuoc Ngoai not found');

            return redirect(route('dnVonNuocNgoais.index'));
        }

        $dnVonNuocNgoai = $this->dnVonNuocNgoaiRepository->update($request->all(), $id);

        Flash::success('Dn Von Nuoc Ngoai updated successfully.');

        return redirect(route('dnVonNuocNgoais.index'));
    }

    /**
     * Remove the specified DnVonNuocNgoai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dnVonNuocNgoai = $this->dnVonNuocNgoaiRepository->find($id);

        if (empty($dnVonNuocNgoai)) {
            Flash::error('Dn Von Nuoc Ngoai not found');

            return redirect(route('dnVonNuocNgoais.index'));
        }

        $this->dnVonNuocNgoaiRepository->delete($id);

        Flash::success('Dn Von Nuoc Ngoai deleted successfully.');

        return redirect(route('dnVonNuocNgoais.index'));
    }
}
