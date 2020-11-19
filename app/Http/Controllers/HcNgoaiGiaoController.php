<?php

namespace App\Http\Controllers;

use App\DataTables\HcNgoaiGiaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHcNgoaiGiaoRequest;
use App\Http\Requests\UpdateHcNgoaiGiaoRequest;
use App\Repositories\HcNgoaiGiaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HcNgoaiGiaoController extends AppBaseController
{
    /** @var  HcNgoaiGiaoRepository */
    private $hcNgoaiGiaoRepository;

    public function __construct(HcNgoaiGiaoRepository $hcNgoaiGiaoRepo)
    {
        $this->hcNgoaiGiaoRepository = $hcNgoaiGiaoRepo;
    }

    /**
     * Display a listing of the HcNgoaiGiao.
     *
     * @param HcNgoaiGiaoDataTable $hcNgoaiGiaoDataTable
     * @return Response
     */
    public function index(HcNgoaiGiaoDataTable $hcNgoaiGiaoDataTable)
    {
        return $hcNgoaiGiaoDataTable->render('hc_ngoai_giaos.index');
    }

    /**
     * Show the form for creating a new HcNgoaiGiao.
     *
     * @return Response
     */
    public function create()
    {
        return view('hc_ngoai_giaos.create');
    }

    /**
     * Store a newly created HcNgoaiGiao in storage.
     *
     * @param CreateHcNgoaiGiaoRequest $request
     *
     * @return Response
     */
    public function store(CreateHcNgoaiGiaoRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $hcNgoaiGiao = $this->hcNgoaiGiaoRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('hcNgoaiGiaos.index'));
    }

    /**
     * Display the specified HcNgoaiGiao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hcNgoaiGiao = $this->hcNgoaiGiaoRepository->find($id);

        if (empty($hcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('hcNgoaiGiaos.index'));
        }

        return view('hc_ngoai_giaos.show')->with('hcNgoaiGiao', $hcNgoaiGiao);
    }

    /**
     * Show the form for editing the specified HcNgoaiGiao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hcNgoaiGiao = $this->hcNgoaiGiaoRepository->find($id);

        if (empty($hcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('hcNgoaiGiaos.index'));
        }
        $hcNgoaiGiao->thoi_han = date_format(new \DateTime($hcNgoaiGiao->thoi_han), 'd/m/Y') ?? '';

        return view('hc_ngoai_giaos.edit')->with('hcNgoaiGiao', $hcNgoaiGiao);
    }

    /**
     * Update the specified HcNgoaiGiao in storage.
     *
     * @param  int              $id
     * @param UpdateHcNgoaiGiaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHcNgoaiGiaoRequest $request)
    {
        $hcNgoaiGiao = $this->hcNgoaiGiaoRepository->find($id);

        if (empty($hcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('hcNgoaiGiaos.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $hcNgoaiGiao = $this->hcNgoaiGiaoRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('hcNgoaiGiaos.index'));
    }

    /**
     * Remove the specified HcNgoaiGiao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hcNgoaiGiao = $this->hcNgoaiGiaoRepository->find($id);

        if (empty($hcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('hcNgoaiGiaos.index'));
        }

        $this->hcNgoaiGiaoRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('hcNgoaiGiaos.index'));
    }
}
