<?php

namespace App\Http\Controllers;

use App\DataTables\XncHcNgoaiGiaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateXncHcNgoaiGiaoRequest;
use App\Http\Requests\UpdateXncHcNgoaiGiaoRequest;
use App\Models\HcNgoaiGiao;
use App\Models\XncHcNgoaiGiao;
use App\Repositories\XncHcNgoaiGiaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class XncHcNgoaiGiaoController extends AppBaseController
{
    /** @var  XncHcNgoaiGiaoRepository */
    private $xncHcNgoaiGiaoRepository;

    public function __construct(XncHcNgoaiGiaoRepository $xncHcNgoaiGiaoRepo)
    {
        $this->xncHcNgoaiGiaoRepository = $xncHcNgoaiGiaoRepo;
    }

    /**
     * Display a listing of the XncHcNgoaiGiao.
     *
     * @param XncHcNgoaiGiaoDataTable $xncHcNgoaiGiaoDataTable
     * @return Response
     */
    public function index(XncHcNgoaiGiaoDataTable $xncHcNgoaiGiaoDataTable)
    {
        return $xncHcNgoaiGiaoDataTable->render('xnc_hc_ngoai_giaos.index');
    }

    /**
     * Show the form for creating a new XncHcNgoaiGiao.
     *
     * @return Response
     */
    public function create()
    {
        $hcs = HcNgoaiGiao::all();
        return view('xnc_hc_ngoai_giaos.create', compact('hcs'));
    }

    /**
     * Store a newly created XncHcNgoaiGiao in storage.
     *
     * @param CreateXncHcNgoaiGiaoRequest $request
     *
     * @return Response
     */
    public function store(CreateXncHcNgoaiGiaoRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_xnc']);
        $input['ngay_xnc'] =  $date->format('Y-m-d');

        $xncHcNgoaiGiao = $this->xncHcNgoaiGiaoRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('xncHcNgoaiGiaos.index'));
    }

    /**
     * Display the specified XncHcNgoaiGiao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $xncHcNgoaiGiao = $this->xncHcNgoaiGiaoRepository->find($id);

        if (empty($xncHcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xncHcNgoaiGiaos.index'));
        }

        return view('xnc_hc_ngoai_giaos.show')->with('xncHcNgoaiGiao', $xncHcNgoaiGiao);
    }

    /**
     * Show the form for editing the specified XncHcNgoaiGiao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $xncHcNgoaiGiao = $this->xncHcNgoaiGiaoRepository->find($id);

        if (empty($xncHcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xncHcNgoaiGiaos.index'));
        }
        $xncHcNgoaiGiao->ngay_xnc = date_format(new \DateTime($xncHcNgoaiGiao->ngay_xnc), 'd/m/Y') ?? '';
        $hcs = HcNgoaiGiao::all();

        return view('xnc_hc_ngoai_giaos.edit', compact(['xncHcNgoaiGiao', 'hcs']));
    }

    /**
     * Update the specified XncHcNgoaiGiao in storage.
     *
     * @param  int              $id
     * @param UpdateXncHcNgoaiGiaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateXncHcNgoaiGiaoRequest $request)
    {
        $xncHcNgoaiGiao = $this->xncHcNgoaiGiaoRepository->find($id);

        if (empty($xncHcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xncHcNgoaiGiaos.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_xnc']);
        $input['ngay_xnc'] =  $date->format('Y-m-d');

        $xncHcNgoaiGiao = $this->xncHcNgoaiGiaoRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('xncHcNgoaiGiaos.index'));
    }

    /**
     * Remove the specified XncHcNgoaiGiao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $xncHcNgoaiGiao = $this->xncHcNgoaiGiaoRepository->find($id);

        if (empty($xncHcNgoaiGiao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('xncHcNgoaiGiaos.index'));
        }

        $this->xncHcNgoaiGiaoRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('xncHcNgoaiGiaos.index'));
    }
}
