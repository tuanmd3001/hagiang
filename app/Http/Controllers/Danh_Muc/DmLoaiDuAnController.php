<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiDuAnDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiDuAnRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiDuAnRequest;
use App\Repositories\Danh_Muc\DmLoaiDuAnRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiDuAnController extends AppBaseController
{
    /** @var  DmLoaiDuAnRepository */
    private $dmLoaiDuAnRepository;

    public function __construct(DmLoaiDuAnRepository $dmLoaiDuAnRepo)
    {
        $this->dmLoaiDuAnRepository = $dmLoaiDuAnRepo;
    }

    /**
     * Display a listing of the DmLoaiDuAn.
     *
     * @param DmLoaiDuAnDataTable $dmLoaiDuAnDataTable
     * @return Response
     */
    public function index(DmLoaiDuAnDataTable $dmLoaiDuAnDataTable)
    {
        return $dmLoaiDuAnDataTable->render('danhMuc.loai_du_an.index');
    }

    /**
     * Show the form for creating a new DmLoaiDuAn.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_du_an.create');
    }

    /**
     * Store a newly created DmLoaiDuAn in storage.
     *
     * @param CreateDmLoaiDuAnRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiDuAnRequest $request)
    {
        $input = $request->all();

        $dmLoaiDuAn = $this->dmLoaiDuAnRepository->create($input);

        Flash::success('Dm Loai Du An saved successfully.');

        return redirect(route('danhMuc.loaiDuAn.index'));
    }

    /**
     * Display the specified DmLoaiDuAn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiDuAn = $this->dmLoaiDuAnRepository->find($id);

        if (empty($dmLoaiDuAn)) {
            Flash::error('Dm Loai Du An not found');

            return redirect(route('danhMuc.loaiDuAn.index'));
        }

        return view('danhMuc.loai_du_an.show')->with('dmLoaiDuAn', $dmLoaiDuAn);
    }

    /**
     * Show the form for editing the specified DmLoaiDuAn.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiDuAn = $this->dmLoaiDuAnRepository->find($id);

        if (empty($dmLoaiDuAn)) {
            Flash::error('Dm Loai Du An not found');

            return redirect(route('danhMuc.loaiDuAn.index'));
        }

        return view('danhMuc.loai_du_an.edit')->with('dmLoaiDuAn', $dmLoaiDuAn);
    }

    /**
     * Update the specified DmLoaiDuAn in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiDuAnRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiDuAnRequest $request)
    {
        $dmLoaiDuAn = $this->dmLoaiDuAnRepository->find($id);

        if (empty($dmLoaiDuAn)) {
            Flash::error('Dm Loai Du An not found');

            return redirect(route('danhMuc.loaiDuAn.index'));
        }

        $dmLoaiDuAn = $this->dmLoaiDuAnRepository->update($request->all(), $id);

        Flash::success('Dm Loai Du An updated successfully.');

        return redirect(route('danhMuc.loaiDuAn.index'));
    }

    /**
     * Remove the specified DmLoaiDuAn from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiDuAn = $this->dmLoaiDuAnRepository->find($id);

        if (empty($dmLoaiDuAn)) {
            Flash::error('Dm Loai Du An not found');

            return redirect(route('danhMuc.loaiDuAn.index'));
        }

        $this->dmLoaiDuAnRepository->delete($id);

        Flash::success('Dm Loai Du An deleted successfully.');

        return redirect(route('danhMuc.loaiDuAn.index'));
    }
}
