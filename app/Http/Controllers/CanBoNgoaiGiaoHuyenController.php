<?php

namespace App\Http\Controllers;

use App\DataTables\CanBoNgoaiGiaoHuyenDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCanBoNgoaiGiaoHuyenRequest;
use App\Http\Requests\UpdateCanBoNgoaiGiaoHuyenRequest;
use App\Repositories\CanBoNgoaiGiaoHuyenRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CanBoNgoaiGiaoHuyenController extends AppBaseController
{
    /** @var  CanBoNgoaiGiaoHuyenRepository */
    private $canBoNgoaiGiaoHuyenRepository;

    public function __construct(CanBoNgoaiGiaoHuyenRepository $canBoNgoaiGiaoHuyenRepo)
    {
        $this->canBoNgoaiGiaoHuyenRepository = $canBoNgoaiGiaoHuyenRepo;
    }

    /**
     * Display a listing of the CanBoNgoaiGiaoHuyen.
     *
     * @param CanBoNgoaiGiaoHuyenDataTable $canBoNgoaiGiaoHuyenDataTable
     * @return Response
     */
    public function index(CanBoNgoaiGiaoHuyenDataTable $canBoNgoaiGiaoHuyenDataTable)
    {
        return $canBoNgoaiGiaoHuyenDataTable->render('can_bo_ngoai_giao_huyens.index');
    }

    /**
     * Show the form for creating a new CanBoNgoaiGiaoHuyen.
     *
     * @return Response
     */
    public function create()
    {
        return view('can_bo_ngoai_giao_huyens.create');
    }

    /**
     * Store a newly created CanBoNgoaiGiaoHuyen in storage.
     *
     * @param CreateCanBoNgoaiGiaoHuyenRequest $request
     *
     * @return Response
     */
    public function store(CreateCanBoNgoaiGiaoHuyenRequest $request)
    {
        $input = $request->all();

        $canBoNgoaiGiaoHuyen = $this->canBoNgoaiGiaoHuyenRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('canBoNgoaiGiaoHuyens.index'));
    }

    /**
     * Display the specified CanBoNgoaiGiaoHuyen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $canBoNgoaiGiaoHuyen = $this->canBoNgoaiGiaoHuyenRepository->find($id);

        if (empty($canBoNgoaiGiaoHuyen)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBoNgoaiGiaoHuyens.index'));
        }

        return view('can_bo_ngoai_giao_huyens.show')->with('canBoNgoaiGiaoHuyen', $canBoNgoaiGiaoHuyen);
    }

    /**
     * Show the form for editing the specified CanBoNgoaiGiaoHuyen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $canBoNgoaiGiaoHuyen = $this->canBoNgoaiGiaoHuyenRepository->find($id);

        if (empty($canBoNgoaiGiaoHuyen)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBoNgoaiGiaoHuyens.index'));
        }

        return view('can_bo_ngoai_giao_huyens.edit')->with('canBoNgoaiGiaoHuyen', $canBoNgoaiGiaoHuyen);
    }

    /**
     * Update the specified CanBoNgoaiGiaoHuyen in storage.
     *
     * @param  int              $id
     * @param UpdateCanBoNgoaiGiaoHuyenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCanBoNgoaiGiaoHuyenRequest $request)
    {
        $canBoNgoaiGiaoHuyen = $this->canBoNgoaiGiaoHuyenRepository->find($id);

        if (empty($canBoNgoaiGiaoHuyen)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBoNgoaiGiaoHuyens.index'));
        }

        $canBoNgoaiGiaoHuyen = $this->canBoNgoaiGiaoHuyenRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('canBoNgoaiGiaoHuyens.index'));
    }

    /**
     * Remove the specified CanBoNgoaiGiaoHuyen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $canBoNgoaiGiaoHuyen = $this->canBoNgoaiGiaoHuyenRepository->find($id);

        if (empty($canBoNgoaiGiaoHuyen)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBoNgoaiGiaoHuyens.index'));
        }

        $this->canBoNgoaiGiaoHuyenRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('canBoNgoaiGiaoHuyens.index'));
    }
}
