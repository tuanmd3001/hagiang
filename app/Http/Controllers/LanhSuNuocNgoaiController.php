<?php

namespace App\Http\Controllers;

use App\DataTables\LanhSuNuocNgoaiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLanhSuNuocNgoaiRequest;
use App\Http\Requests\UpdateLanhSuNuocNgoaiRequest;
use App\Repositories\LanhSuNuocNgoaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LanhSuNuocNgoaiController extends AppBaseController
{
    /** @var  LanhSuNuocNgoaiRepository */
    private $lanhSuNuocNgoaiRepository;

    public function __construct(LanhSuNuocNgoaiRepository $lanhSuNuocNgoaiRepo)
    {
        $this->lanhSuNuocNgoaiRepository = $lanhSuNuocNgoaiRepo;
    }

    /**
     * Display a listing of the LanhSuNuocNgoai.
     *
     * @param LanhSuNuocNgoaiDataTable $lanhSuNuocNgoaiDataTable
     * @return Response
     */
    public function index(LanhSuNuocNgoaiDataTable $lanhSuNuocNgoaiDataTable)
    {
        return $lanhSuNuocNgoaiDataTable->render('lanh_su_nuoc_ngoais.index');
    }

    /**
     * Show the form for creating a new LanhSuNuocNgoai.
     *
     * @return Response
     */
    public function create()
    {
        return view('lanh_su_nuoc_ngoais.create');
    }

    /**
     * Store a newly created LanhSuNuocNgoai in storage.
     *
     * @param CreateLanhSuNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function store(CreateLanhSuNuocNgoaiRequest $request)
    {
        $input = $request->all();

        $lanhSuNuocNgoai = $this->lanhSuNuocNgoaiRepository->create($input);

        Flash::success('Lanh Su Nuoc Ngoai saved successfully.');

        return redirect(route('lanhSuNuocNgoais.index'));
    }

    /**
     * Display the specified LanhSuNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lanhSuNuocNgoai = $this->lanhSuNuocNgoaiRepository->find($id);

        if (empty($lanhSuNuocNgoai)) {
            Flash::error('Lanh Su Nuoc Ngoai not found');

            return redirect(route('lanhSuNuocNgoais.index'));
        }

        return view('lanh_su_nuoc_ngoais.show')->with('lanhSuNuocNgoai', $lanhSuNuocNgoai);
    }

    /**
     * Show the form for editing the specified LanhSuNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lanhSuNuocNgoai = $this->lanhSuNuocNgoaiRepository->find($id);

        if (empty($lanhSuNuocNgoai)) {
            Flash::error('Lanh Su Nuoc Ngoai not found');

            return redirect(route('lanhSuNuocNgoais.index'));
        }

        return view('lanh_su_nuoc_ngoais.edit')->with('lanhSuNuocNgoai', $lanhSuNuocNgoai);
    }

    /**
     * Update the specified LanhSuNuocNgoai in storage.
     *
     * @param  int              $id
     * @param UpdateLanhSuNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanhSuNuocNgoaiRequest $request)
    {
        $lanhSuNuocNgoai = $this->lanhSuNuocNgoaiRepository->find($id);

        if (empty($lanhSuNuocNgoai)) {
            Flash::error('Lanh Su Nuoc Ngoai not found');

            return redirect(route('lanhSuNuocNgoais.index'));
        }

        $lanhSuNuocNgoai = $this->lanhSuNuocNgoaiRepository->update($request->all(), $id);

        Flash::success('Lanh Su Nuoc Ngoai updated successfully.');

        return redirect(route('lanhSuNuocNgoais.index'));
    }

    /**
     * Remove the specified LanhSuNuocNgoai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lanhSuNuocNgoai = $this->lanhSuNuocNgoaiRepository->find($id);

        if (empty($lanhSuNuocNgoai)) {
            Flash::error('Lanh Su Nuoc Ngoai not found');

            return redirect(route('lanhSuNuocNgoais.index'));
        }

        $this->lanhSuNuocNgoaiRepository->delete($id);

        Flash::success('Lanh Su Nuoc Ngoai deleted successfully.');

        return redirect(route('lanhSuNuocNgoais.index'));
    }
}
