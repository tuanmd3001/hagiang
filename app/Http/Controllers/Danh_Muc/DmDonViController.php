<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmDonViDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmDonViRequest;
use App\Http\Requests\Danh_Muc\UpdateDmDonViRequest;
use App\Repositories\Danh_Muc\DmDonViRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmDonViController extends AppBaseController
{
    /** @var  DmDonViRepository */
    private $dmDonViRepository;

    public function __construct(DmDonViRepository $dmDonViRepo)
    {
        $this->dmDonViRepository = $dmDonViRepo;
    }

    /**
     * Display a listing of the DmDonVi.
     *
     * @param DmDonViDataTable $dmDonViDataTable
     * @return Response
     */
    public function index(DmDonViDataTable $dmDonViDataTable)
    {
        return $dmDonViDataTable->render('danhMuc.don_vi.index');
    }

    /**
     * Show the form for creating a new DmDonVi.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.don_vi.create');
    }

    /**
     * Store a newly created DmDonVi in storage.
     *
     * @param CreateDmDonViRequest $request
     *
     * @return Response
     */
    public function store(CreateDmDonViRequest $request)
    {
        $input = $request->all();

        $dmDonVi = $this->dmDonViRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('danhMuc.donVi.index'));
    }

    /**
     * Display the specified DmDonVi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmDonVi = $this->dmDonViRepository->find($id);

        if (empty($dmDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.donVi.index'));
        }

        return view('danhMuc.don_vi.show')->with('dmDonVi', $dmDonVi);
    }

    /**
     * Show the form for editing the specified DmDonVi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmDonVi = $this->dmDonViRepository->find($id);

        if (empty($dmDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.donVi.index'));
        }

        return view('danhMuc.don_vi.edit')->with('dmDonVi', $dmDonVi);
    }

    /**
     * Update the specified DmDonVi in storage.
     *
     * @param  int              $id
     * @param UpdateDmDonViRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmDonViRequest $request)
    {
        $dmDonVi = $this->dmDonViRepository->find($id);

        if (empty($dmDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.donVi.index'));
        }

        $dmDonVi = $this->dmDonViRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('danhMuc.donVi.index'));
    }

    /**
     * Remove the specified DmDonVi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmDonVi = $this->dmDonViRepository->find($id);

        if (empty($dmDonVi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('danhMuc.donVi.index'));
        }

        $this->dmDonViRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('danhMuc.donVi.index'));
    }
}
