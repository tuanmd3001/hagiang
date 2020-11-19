<?php

namespace App\Http\Controllers;

use App\DataTables\CanBoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCanBoRequest;
use App\Http\Requests\UpdateCanBoRequest;
use App\Repositories\CanBoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CanBoController extends AppBaseController
{
    /** @var  CanBoRepository */
    private $canBoRepository;

    public function __construct(CanBoRepository $canBoRepo)
    {
        $this->canBoRepository = $canBoRepo;
    }

    /**
     * Display a listing of the CanBo.
     *
     * @param CanBoDataTable $canBoDataTable
     * @return Response
     */
    public function index(CanBoDataTable $canBoDataTable)
    {
        return $canBoDataTable->render('can_bos.index');
    }

    /**
     * Show the form for creating a new CanBo.
     *
     * @return Response
     */
    public function create()
    {
        return view('can_bos.create');
    }

    /**
     * Store a newly created CanBo in storage.
     *
     * @param CreateCanBoRequest $request
     *
     * @return Response
     */
    public function store(CreateCanBoRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_sinh']);
        $input['ngay_sinh'] =  $date->format('Y-m-d');

        $canBo = $this->canBoRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('canBos.index'));
    }

    /**
     * Display the specified CanBo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $canBo = $this->canBoRepository->find($id);

        if (empty($canBo)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBos.index'));
        }

        return view('can_bos.show')->with('canBo', $canBo);
    }

    /**
     * Show the form for editing the specified CanBo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $canBo = $this->canBoRepository->find($id);

        if (empty($canBo)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBos.index'));
        }
        $canBo->ngay_sinh = date_format(new \DateTime($canBo->ngay_sinh), 'd/m/Y') ?? '';

        return view('can_bos.edit')->with('canBo', $canBo);
    }

    /**
     * Update the specified CanBo in storage.
     *
     * @param  int              $id
     * @param UpdateCanBoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCanBoRequest $request)
    {
        $canBo = $this->canBoRepository->find($id);

        if (empty($canBo)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBos.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_sinh']);
        $input['ngay_sinh'] =  $date->format('Y-m-d');

        $canBo = $this->canBoRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('canBos.index'));
    }

    /**
     * Remove the specified CanBo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $canBo = $this->canBoRepository->find($id);

        if (empty($canBo)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('canBos.index'));
        }

        $this->canBoRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('canBos.index'));
    }
}
