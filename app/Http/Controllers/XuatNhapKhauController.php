<?php

namespace App\Http\Controllers;

use App\DataTables\XuatNhapKhauDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateXuatNhapKhauRequest;
use App\Http\Requests\UpdateXuatNhapKhauRequest;
use App\Repositories\XuatNhapKhauRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class XuatNhapKhauController extends AppBaseController
{
    /** @var  XuatNhapKhauRepository */
    private $xuatNhapKhauRepository;

    public function __construct(XuatNhapKhauRepository $xuatNhapKhauRepo)
    {
        $this->xuatNhapKhauRepository = $xuatNhapKhauRepo;
    }

    /**
     * Display a listing of the XuatNhapKhau.
     *
     * @param XuatNhapKhauDataTable $xuatNhapKhauDataTable
     * @return Response
     */
    public function index(XuatNhapKhauDataTable $xuatNhapKhauDataTable)
    {
        return $xuatNhapKhauDataTable->render('xuat_nhap_khaus.index');
    }

    /**
     * Show the form for creating a new XuatNhapKhau.
     *
     * @return Response
     */
    public function create()
    {
        return view('xuat_nhap_khaus.create');
    }

    /**
     * Store a newly created XuatNhapKhau in storage.
     *
     * @param CreateXuatNhapKhauRequest $request
     *
     * @return Response
     */
    public function store(CreateXuatNhapKhauRequest $request)
    {
        $input = $request->all();

        $xuatNhapKhau = $this->xuatNhapKhauRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('xuatNhapKhaus.index'));
    }

    /**
     * Display the specified XuatNhapKhau.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $xuatNhapKhau = $this->xuatNhapKhauRepository->find($id);

        if (empty($xuatNhapKhau)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xuatNhapKhaus.index'));
        }

        return view('xuat_nhap_khaus.show')->with('xuatNhapKhau', $xuatNhapKhau);
    }

    /**
     * Show the form for editing the specified XuatNhapKhau.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $xuatNhapKhau = $this->xuatNhapKhauRepository->find($id);

        if (empty($xuatNhapKhau)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xuatNhapKhaus.index'));
        }

        return view('xuat_nhap_khaus.edit')->with('xuatNhapKhau', $xuatNhapKhau);
    }

    /**
     * Update the specified XuatNhapKhau in storage.
     *
     * @param  int              $id
     * @param UpdateXuatNhapKhauRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateXuatNhapKhauRequest $request)
    {
        $xuatNhapKhau = $this->xuatNhapKhauRepository->find($id);

        if (empty($xuatNhapKhau)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xuatNhapKhaus.index'));
        }

        $xuatNhapKhau = $this->xuatNhapKhauRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('xuatNhapKhaus.index'));
    }

    /**
     * Remove the specified XuatNhapKhau from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $xuatNhapKhau = $this->xuatNhapKhauRepository->find($id);

        if (empty($xuatNhapKhau)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xuatNhapKhaus.index'));
        }

        $this->xuatNhapKhauRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('xuatNhapKhaus.index'));
    }
}
