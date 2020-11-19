<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmQuocGiaDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmQuocGiaRequest;
use App\Http\Requests\Danh_Muc\UpdateDmQuocGiaRequest;
use App\Repositories\Danh_Muc\DmQuocGiaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmQuocGiaController extends AppBaseController
{
    /** @var  DmQuocGiaRepository */
    private $dmQuocGiaRepository;

    public function __construct(DmQuocGiaRepository $dmQuocGiaRepo)
    {
        $this->dmQuocGiaRepository = $dmQuocGiaRepo;
    }

    /**
     * Display a listing of the DmQuocGia.
     *
     * @param DmQuocGiaDataTable $dmQuocGiaDataTable
     * @return Response
     */
    public function index(DmQuocGiaDataTable $dmQuocGiaDataTable)
    {
        return $dmQuocGiaDataTable->render('danhMuc.quoc_gia.index');
    }

    /**
     * Show the form for creating a new DmQuocGia.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.quoc_gia.create');
    }

    /**
     * Store a newly created DmQuocGia in storage.
     *
     * @param CreateDmQuocGiaRequest $request
     *
     * @return Response
     */
    public function store(CreateDmQuocGiaRequest $request)
    {
        $input = $request->all();

        $dmQuocGia = $this->dmQuocGiaRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.quocGia.index'));
    }

    /**
     * Display the specified DmQuocGia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmQuocGia = $this->dmQuocGiaRepository->find($id);

        if (empty($dmQuocGia)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.quocGia.index'));
        }

        return view('danhMuc.quoc_gia.show')->with('dmQuocGia', $dmQuocGia);
    }

    /**
     * Show the form for editing the specified DmQuocGia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmQuocGia = $this->dmQuocGiaRepository->find($id);

        if (empty($dmQuocGia)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.quocGia.index'));
        }

        return view('danhMuc.quoc_gia.edit')->with('dmQuocGia', $dmQuocGia);
    }

    /**
     * Update the specified DmQuocGia in storage.
     *
     * @param  int              $id
     * @param UpdateDmQuocGiaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmQuocGiaRequest $request)
    {
        $dmQuocGia = $this->dmQuocGiaRepository->find($id);

        if (empty($dmQuocGia)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.quocGia.index'));
        }

        $dmQuocGia = $this->dmQuocGiaRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.quocGia.index'));
    }

    /**
     * Remove the specified DmQuocGia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmQuocGia = $this->dmQuocGiaRepository->find($id);

        if (empty($dmQuocGia)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.quocGia.index'));
        }

        $this->dmQuocGiaRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.quocGia.index'));
    }
}
