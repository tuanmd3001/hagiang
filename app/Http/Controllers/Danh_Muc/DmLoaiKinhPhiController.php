<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiKinhPhiDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiKinhPhiRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiKinhPhiRequest;
use App\Repositories\Danh_Muc\DmLoaiKinhPhiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiKinhPhiController extends AppBaseController
{
    /** @var  DmLoaiKinhPhiRepository */
    private $dmLoaiKinhPhiRepository;

    public function __construct(DmLoaiKinhPhiRepository $dmLoaiKinhPhiRepo)
    {
        $this->dmLoaiKinhPhiRepository = $dmLoaiKinhPhiRepo;
    }

    /**
     * Display a listing of the DmLoaiKinhPhi.
     *
     * @param DmLoaiKinhPhiDataTable $dmLoaiKinhPhiDataTable
     * @return Response
     */
    public function index(DmLoaiKinhPhiDataTable $dmLoaiKinhPhiDataTable)
    {
        return $dmLoaiKinhPhiDataTable->render('danhMuc.loai_kinh_phi.index');
    }

    /**
     * Show the form for creating a new DmLoaiKinhPhi.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_kinh_phi.create');
    }

    /**
     * Store a newly created DmLoaiKinhPhi in storage.
     *
     * @param CreateDmLoaiKinhPhiRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiKinhPhiRequest $request)
    {
        $input = $request->all();

        $dmLoaiKinhPhi = $this->dmLoaiKinhPhiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.loaiKinhPhi.index'));
    }

    /**
     * Display the specified DmLoaiKinhPhi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiKinhPhi = $this->dmLoaiKinhPhiRepository->find($id);

        if (empty($dmLoaiKinhPhi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiKinhPhi.index'));
        }

        return view('danhMuc.loai_kinh_phi.show')->with('dmLoaiKinhPhi', $dmLoaiKinhPhi);
    }

    /**
     * Show the form for editing the specified DmLoaiKinhPhi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiKinhPhi = $this->dmLoaiKinhPhiRepository->find($id);

        if (empty($dmLoaiKinhPhi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiKinhPhi.index'));
        }

        return view('danhMuc.loai_kinh_phi.edit')->with('dmLoaiKinhPhi', $dmLoaiKinhPhi);
    }

    /**
     * Update the specified DmLoaiKinhPhi in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiKinhPhiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiKinhPhiRequest $request)
    {
        $dmLoaiKinhPhi = $this->dmLoaiKinhPhiRepository->find($id);

        if (empty($dmLoaiKinhPhi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiKinhPhi.index'));
        }

        $dmLoaiKinhPhi = $this->dmLoaiKinhPhiRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.loaiKinhPhi.index'));
    }

    /**
     * Remove the specified DmLoaiKinhPhi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiKinhPhi = $this->dmLoaiKinhPhiRepository->find($id);

        if (empty($dmLoaiKinhPhi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.loaiKinhPhi.index'));
        }

        $this->dmLoaiKinhPhiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.loaiKinhPhi.index'));
    }
}
