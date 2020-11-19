<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiSuKienDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiSuKienRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiSuKienRequest;
use App\Repositories\Danh_Muc\DmLoaiSuKienRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiSuKienController extends AppBaseController
{
    /** @var  DmLoaiSuKienRepository */
    private $dmLoaiSuKienRepository;

    public function __construct(DmLoaiSuKienRepository $dmLoaiSuKienRepo)
    {
        $this->dmLoaiSuKienRepository = $dmLoaiSuKienRepo;
    }

    /**
     * Display a listing of the DmLoaiSuKien.
     *
     * @param DmLoaiSuKienDataTable $dmLoaiSuKienDataTable
     * @return Response
     */
    public function index(DmLoaiSuKienDataTable $dmLoaiSuKienDataTable)
    {
        return $dmLoaiSuKienDataTable->render('danhMuc.loai_su_kien.index');
    }

    /**
     * Show the form for creating a new DmLoaiSuKien.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_su_kien.create');
    }

    /**
     * Store a newly created DmLoaiSuKien in storage.
     *
     * @param CreateDmLoaiSuKienRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiSuKienRequest $request)
    {
        $input = $request->all();

        $dmLoaiSuKien = $this->dmLoaiSuKienRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.loaiSuKien.index'));
    }

    /**
     * Display the specified DmLoaiSuKien.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiSuKien = $this->dmLoaiSuKienRepository->find($id);

        if (empty($dmLoaiSuKien)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiSuKien.index'));
        }

        return view('danhMuc.loai_su_kien.show')->with('dmLoaiSuKien', $dmLoaiSuKien);
    }

    /**
     * Show the form for editing the specified DmLoaiSuKien.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiSuKien = $this->dmLoaiSuKienRepository->find($id);

        if (empty($dmLoaiSuKien)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiSuKien.index'));
        }

        return view('danhMuc.loai_su_kien.edit')->with('dmLoaiSuKien', $dmLoaiSuKien);
    }

    /**
     * Update the specified DmLoaiSuKien in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiSuKienRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiSuKienRequest $request)
    {
        $dmLoaiSuKien = $this->dmLoaiSuKienRepository->find($id);

        if (empty($dmLoaiSuKien)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiSuKien.index'));
        }

        $dmLoaiSuKien = $this->dmLoaiSuKienRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.loaiSuKien.index'));
    }

    /**
     * Remove the specified DmLoaiSuKien from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiSuKien = $this->dmLoaiSuKienRepository->find($id);

        if (empty($dmLoaiSuKien)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiSuKien.index'));
        }

        $this->dmLoaiSuKienRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.loaiSuKien.index'));
    }
}
