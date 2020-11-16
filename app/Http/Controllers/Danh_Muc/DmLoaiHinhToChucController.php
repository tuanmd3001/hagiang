<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiHinhToChucDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiHinhToChucRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiHinhToChucRequest;
use App\Repositories\Danh_Muc\DmLoaiHinhToChucRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiHinhToChucController extends AppBaseController
{
    /** @var  DmLoaiHinhToChucRepository */
    private $dmLoaiHinhToChucRepository;

    public function __construct(DmLoaiHinhToChucRepository $dmLoaiHinhToChucRepo)
    {
        $this->dmLoaiHinhToChucRepository = $dmLoaiHinhToChucRepo;
    }

    /**
     * Display a listing of the DmLoaiHinhToChuc.
     *
     * @param DmLoaiHinhToChucDataTable $dmLoaiHinhToChucDataTable
     * @return Response
     */
    public function index(DmLoaiHinhToChucDataTable $dmLoaiHinhToChucDataTable)
    {
        return $dmLoaiHinhToChucDataTable->render('danhMuc.loai_hinh_to_chuc.index');
    }

    /**
     * Show the form for creating a new DmLoaiHinhToChuc.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_hinh_to_chuc.create');
    }

    /**
     * Store a newly created DmLoaiHinhToChuc in storage.
     *
     * @param CreateDmLoaiHinhToChucRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiHinhToChucRequest $request)
    {
        $input = $request->all();

        $dmLoaiHinhToChuc = $this->dmLoaiHinhToChucRepository->create($input);

        Flash::success('Dm Loai Hinh To Chuc saved successfully.');

        return redirect(route('danhMuc.loaiHinhToChuc.index'));
    }

    /**
     * Display the specified DmLoaiHinhToChuc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiHinhToChuc = $this->dmLoaiHinhToChucRepository->find($id);

        if (empty($dmLoaiHinhToChuc)) {
            Flash::error('Dm Loai Hinh To Chuc not found');

            return redirect(route('danhMuc.loaiHinhToChuc.index'));
        }

        return view('danhMuc.loai_hinh_to_chuc.show')->with('dmLoaiHinhToChuc', $dmLoaiHinhToChuc);
    }

    /**
     * Show the form for editing the specified DmLoaiHinhToChuc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiHinhToChuc = $this->dmLoaiHinhToChucRepository->find($id);

        if (empty($dmLoaiHinhToChuc)) {
            Flash::error('Dm Loai Hinh To Chuc not found');

            return redirect(route('danhMuc.loaiHinhToChuc.index'));
        }

        return view('danhMuc.loai_hinh_to_chuc.edit')->with('dmLoaiHinhToChuc', $dmLoaiHinhToChuc);
    }

    /**
     * Update the specified DmLoaiHinhToChuc in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiHinhToChucRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiHinhToChucRequest $request)
    {
        $dmLoaiHinhToChuc = $this->dmLoaiHinhToChucRepository->find($id);

        if (empty($dmLoaiHinhToChuc)) {
            Flash::error('Dm Loai Hinh To Chuc not found');

            return redirect(route('danhMuc.loaiHinhToChuc.index'));
        }

        $dmLoaiHinhToChuc = $this->dmLoaiHinhToChucRepository->update($request->all(), $id);

        Flash::success('Dm Loai Hinh To Chuc updated successfully.');

        return redirect(route('danhMuc.loaiHinhToChuc.index'));
    }

    /**
     * Remove the specified DmLoaiHinhToChuc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiHinhToChuc = $this->dmLoaiHinhToChucRepository->find($id);

        if (empty($dmLoaiHinhToChuc)) {
            Flash::error('Dm Loai Hinh To Chuc not found');

            return redirect(route('danhMuc.loaiHinhToChuc.index'));
        }

        $this->dmLoaiHinhToChucRepository->delete($id);

        Flash::success('Dm Loai Hinh To Chuc deleted successfully.');

        return redirect(route('danhMuc.loaiHinhToChuc.index'));
    }
}
