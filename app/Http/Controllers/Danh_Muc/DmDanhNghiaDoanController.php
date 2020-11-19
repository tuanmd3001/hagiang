<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmDanhNghiaDoanDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmDanhNghiaDoanRequest;
use App\Http\Requests\Danh_Muc\UpdateDmDanhNghiaDoanRequest;
use App\Repositories\Danh_Muc\DmDanhNghiaDoanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmDanhNghiaDoanController extends AppBaseController
{
    /** @var  DmDanhNghiaDoanRepository */
    private $dmDanhNghiaDoanRepository;

    public function __construct(DmDanhNghiaDoanRepository $dmDanhNghiaDoanRepo)
    {
        $this->dmDanhNghiaDoanRepository = $dmDanhNghiaDoanRepo;
    }

    /**
     * Display a listing of the DmDanhNghiaDoan.
     *
     * @param DmDanhNghiaDoanDataTable $dmDanhNghiaDoanDataTable
     * @return Response
     */
    public function index(DmDanhNghiaDoanDataTable $dmDanhNghiaDoanDataTable)
    {
        return $dmDanhNghiaDoanDataTable->render('danhMuc.danh_nghia_doan.index');
    }

    /**
     * Show the form for creating a new DmDanhNghiaDoan.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.danh_nghia_doan.create');
    }

    /**
     * Store a newly created DmDanhNghiaDoan in storage.
     *
     * @param CreateDmDanhNghiaDoanRequest $request
     *
     * @return Response
     */
    public function store(CreateDmDanhNghiaDoanRequest $request)
    {
        $input = $request->all();

        $dmDanhNghiaDoan = $this->dmDanhNghiaDoanRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.danhNghiaDoan.index'));
    }

    /**
     * Display the specified DmDanhNghiaDoan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmDanhNghiaDoan = $this->dmDanhNghiaDoanRepository->find($id);

        if (empty($dmDanhNghiaDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.danhNghiaDoan.index'));
        }

        return view('danhMuc.danh_nghia_doan.show')->with('dmDanhNghiaDoan', $dmDanhNghiaDoan);
    }

    /**
     * Show the form for editing the specified DmDanhNghiaDoan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmDanhNghiaDoan = $this->dmDanhNghiaDoanRepository->find($id);

        if (empty($dmDanhNghiaDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.danhNghiaDoan.index'));
        }

        return view('danhMuc.danh_nghia_doan.edit')->with('dmDanhNghiaDoan', $dmDanhNghiaDoan);
    }

    /**
     * Update the specified DmDanhNghiaDoan in storage.
     *
     * @param  int              $id
     * @param UpdateDmDanhNghiaDoanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmDanhNghiaDoanRequest $request)
    {
        $dmDanhNghiaDoan = $this->dmDanhNghiaDoanRepository->find($id);

        if (empty($dmDanhNghiaDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.danhNghiaDoan.index'));
        }

        $dmDanhNghiaDoan = $this->dmDanhNghiaDoanRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.danhNghiaDoan.index'));
    }

    /**
     * Remove the specified DmDanhNghiaDoan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmDanhNghiaDoan = $this->dmDanhNghiaDoanRepository->find($id);

        if (empty($dmDanhNghiaDoan)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.danhNghiaDoan.index'));
        }

        $this->dmDanhNghiaDoanRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.danhNghiaDoan.index'));
    }
}
