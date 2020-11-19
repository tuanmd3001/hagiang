<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiDoanDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiDoanRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiDoanRequest;
use App\Repositories\Danh_Muc\DmLoaiDoanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiDoanController extends AppBaseController
{
    /** @var  DmLoaiDoanRepository */
    private $dmLoaiDoanRepository;

    public function __construct(DmLoaiDoanRepository $dmLoaiDoanRepo)
    {
        $this->dmLoaiDoanRepository = $dmLoaiDoanRepo;
    }

    /**
     * Display a listing of the DmLoaiDoan.
     *
     * @param DmLoaiDoanDataTable $dmLoaiDoanDataTable
     * @return Response
     */
    public function index(DmLoaiDoanDataTable $dmLoaiDoanDataTable)
    {
        return $dmLoaiDoanDataTable->render('danhMuc.loai_doan.index');
    }

    /**
     * Show the form for creating a new DmLoaiDoan.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_doan.create');
    }

    /**
     * Store a newly created DmLoaiDoan in storage.
     *
     * @param CreateDmLoaiDoanRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiDoanRequest $request)
    {
        $input = $request->all();

        $dmLoaiDoan = $this->dmLoaiDoanRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.loaiDoan.index'));
    }

    /**
     * Display the specified DmLoaiDoan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiDoan = $this->dmLoaiDoanRepository->find($id);

        if (empty($dmLoaiDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiDoan.index'));
        }

        return view('danhMuc.loai_doan.show')->with('dmLoaiDoan', $dmLoaiDoan);
    }

    /**
     * Show the form for editing the specified DmLoaiDoan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiDoan = $this->dmLoaiDoanRepository->find($id);

        if (empty($dmLoaiDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiDoan.index'));
        }

        return view('danhMuc.loai_doan.edit')->with('dmLoaiDoan', $dmLoaiDoan);
    }

    /**
     * Update the specified DmLoaiDoan in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiDoanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiDoanRequest $request)
    {
        $dmLoaiDoan = $this->dmLoaiDoanRepository->find($id);

        if (empty($dmLoaiDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiDoan.index'));
        }

        $dmLoaiDoan = $this->dmLoaiDoanRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.loaiDoan.index'));
    }

    /**
     * Remove the specified DmLoaiDoan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiDoan = $this->dmLoaiDoanRepository->find($id);

        if (empty($dmLoaiDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiDoan.index'));
        }

        $this->dmLoaiDoanRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.loaiDoan.index'));
    }
}
