<?php

namespace App\Http\Controllers;

use App\DataTables\LanhSuTinhDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLanhSuTinhRequest;
use App\Http\Requests\UpdateLanhSuTinhRequest;
use App\Repositories\LanhSuTinhRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LanhSuTinhController extends AppBaseController
{
    /** @var  LanhSuTinhRepository */
    private $lanhSuTinhRepository;

    public function __construct(LanhSuTinhRepository $lanhSuTinhRepo)
    {
        $this->lanhSuTinhRepository = $lanhSuTinhRepo;
    }

    /**
     * Display a listing of the LanhSuTinh.
     *
     * @param LanhSuTinhDataTable $lanhSuTinhDataTable
     * @return Response
     */
    public function index(LanhSuTinhDataTable $lanhSuTinhDataTable)
    {
        return $lanhSuTinhDataTable->render('lanh_su_tinhs.index');
    }

    /**
     * Show the form for creating a new LanhSuTinh.
     *
     * @return Response
     */
    public function create()
    {
        return view('lanh_su_tinhs.create');
    }

    /**
     * Store a newly created LanhSuTinh in storage.
     *
     * @param CreateLanhSuTinhRequest $request
     *
     * @return Response
     */
    public function store(CreateLanhSuTinhRequest $request)
    {
        $input = $request->all();

        $lanhSuTinh = $this->lanhSuTinhRepository->create($input);

        Flash::success('Lanh Su Tinh saved successfully.');

        return redirect(route('lanhSuTinhs.index'));
    }

    /**
     * Display the specified LanhSuTinh.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lanhSuTinh = $this->lanhSuTinhRepository->find($id);

        if (empty($lanhSuTinh)) {
            Flash::error('Lanh Su Tinh not found');

            return redirect(route('lanhSuTinhs.index'));
        }

        return view('lanh_su_tinhs.show')->with('lanhSuTinh', $lanhSuTinh);
    }

    /**
     * Show the form for editing the specified LanhSuTinh.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lanhSuTinh = $this->lanhSuTinhRepository->find($id);

        if (empty($lanhSuTinh)) {
            Flash::error('Lanh Su Tinh not found');

            return redirect(route('lanhSuTinhs.index'));
        }

        return view('lanh_su_tinhs.edit')->with('lanhSuTinh', $lanhSuTinh);
    }

    /**
     * Update the specified LanhSuTinh in storage.
     *
     * @param  int              $id
     * @param UpdateLanhSuTinhRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanhSuTinhRequest $request)
    {
        $lanhSuTinh = $this->lanhSuTinhRepository->find($id);

        if (empty($lanhSuTinh)) {
            Flash::error('Lanh Su Tinh not found');

            return redirect(route('lanhSuTinhs.index'));
        }

        $lanhSuTinh = $this->lanhSuTinhRepository->update($request->all(), $id);

        Flash::success('Lanh Su Tinh updated successfully.');

        return redirect(route('lanhSuTinhs.index'));
    }

    /**
     * Remove the specified LanhSuTinh from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lanhSuTinh = $this->lanhSuTinhRepository->find($id);

        if (empty($lanhSuTinh)) {
            Flash::error('Lanh Su Tinh not found');

            return redirect(route('lanhSuTinhs.index'));
        }

        $this->lanhSuTinhRepository->delete($id);

        Flash::success('Lanh Su Tinh deleted successfully.');

        return redirect(route('lanhSuTinhs.index'));
    }
}
