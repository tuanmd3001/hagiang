<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmCapDonViDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmCapDonViRequest;
use App\Http\Requests\Danh_Muc\UpdateDmCapDonViRequest;
use App\Repositories\Danh_Muc\DmCapDonViRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmCapDonViController extends AppBaseController
{
    /** @var  DmCapDonViRepository */
    private $dmCapDonViRepository;

    public function __construct(DmCapDonViRepository $dmCapDonViRepo)
    {
        $this->dmCapDonViRepository = $dmCapDonViRepo;
    }

    /**
     * Display a listing of the DmCapDonVi.
     *
     * @param DmCapDonViDataTable $dmCapDonViDataTable
     * @return Response
     */
    public function index(DmCapDonViDataTable $dmCapDonViDataTable)
    {
        return $dmCapDonViDataTable->render('danhMuc.cap_don_vi.index');
    }

    /**
     * Show the form for creating a new DmCapDonVi.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.cap_don_vi.create');
    }

    /**
     * Store a newly created DmCapDonVi in storage.
     *
     * @param CreateDmCapDonViRequest $request
     *
     * @return Response
     */
    public function store(CreateDmCapDonViRequest $request)
    {
        $input = $request->all();

        $dmCapDonVi = $this->dmCapDonViRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.capDonVi.index'));
    }

    /**
     * Display the specified DmCapDonVi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmCapDonVi = $this->dmCapDonViRepository->find($id);

        if (empty($dmCapDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.capDonVi.index'));
        }

        return view('danhMuc.cap_don_vi.show')->with('dmCapDonVi', $dmCapDonVi);
    }

    /**
     * Show the form for editing the specified DmCapDonVi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmCapDonVi = $this->dmCapDonViRepository->find($id);

        if (empty($dmCapDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.capDonVi.index'));
        }

        return view('danhMuc.cap_don_vi.edit')->with('dmCapDonVi', $dmCapDonVi);
    }

    /**
     * Update the specified DmCapDonVi in storage.
     *
     * @param  int              $id
     * @param UpdateDmCapDonViRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmCapDonViRequest $request)
    {
        $dmCapDonVi = $this->dmCapDonViRepository->find($id);

        if (empty($dmCapDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.capDonVi.index'));
        }

        $dmCapDonVi = $this->dmCapDonViRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.capDonVi.index'));
    }

    /**
     * Remove the specified DmCapDonVi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmCapDonVi = $this->dmCapDonViRepository->find($id);

        if (empty($dmCapDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.capDonVi.index'));
        }

        $this->dmCapDonViRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.capDonVi.index'));
    }
}
