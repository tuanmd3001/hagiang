<?php

namespace App\Http\Controllers;

use App\DataTables\TtqtDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTtqtRequest;
use App\Http\Requests\UpdateTtqtRequest;
use App\Models\Danh_Muc\DmLoaiVanBan;
use App\Models\Danh_Muc\DmQuocGia;
use App\Models\Ttqt;
use App\Repositories\TtqtRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TtqtController extends AppBaseController
{
    /** @var  TtqtRepository */
    private $ttqtRepository;
    private $level;

    public function __construct(TtqtRepository $ttqtRepo)
    {
        $this->ttqtRepository = $ttqtRepo;
        $this->level = Ttqt::LEVEL_TINH;

        if (\Request::is(Ttqt::ROUTE_NAME[Ttqt::LEVEL_SO] . '*')){
            $this->level = Ttqt::LEVEL_SO;
        }
        elseif (\Request::is(Ttqt::ROUTE_NAME[Ttqt::LEVEL_TP] . '*')){
            $this->level = Ttqt::LEVEL_TP;
        }
    }

    /**
     * Display a listing of the Ttqt.
     *
     * @param TtqtDataTable $ttqtDataTable
     * @return Response
     */
    public function index()
    {
        $level = $this->level;
        $datatable = new TtqtDataTable($level);

        return $datatable->render('ttqts.index', compact('level'));
    }

    /**
     * Show the form for creating a new Ttqt.
     *
     * @return Response
     */
    public function create()
    {
        $quoc_gias = DmQuocGia::all();
        $loai_vbs = DmLoaiVanBan::all();
        $level = $this->level;
        return view('ttqts.create', compact('level', 'quoc_gias', 'loai_vbs'));
    }

    /**
     * Store a newly created Ttqt in storage.
     *
     * @param CreateTtqtRequest $request
     *
     * @return Response
     */
    public function store(CreateTtqtRequest $request)
    {
        $input = $request->all();

        $ngay_ky = \DateTime::createFromFormat('d/m/Y', $input['ngay_ky']);
        $input['ngay_ky'] =  $ngay_ky->format('Y-m-d');

        $ngay_hieu_luc = \DateTime::createFromFormat('d/m/Y', $input['ngay_hieu_luc']);
        $input['ngay_hieu_luc'] =  $ngay_hieu_luc->format('Y-m-d');

        if (isset($input['uy_quyen'])) {
            $input['uy_quyen'] = 1;
        }
        else {
            $input['uy_quyen'] = 0;
        }
        $ttqt = $this->ttqtRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
    }

    /**
     * Display the specified Ttqt.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ttqt = $this->ttqtRepository->find($id);

        if (empty($ttqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
        }
        $level = $this->level;
        return view('ttqts.show', compact(['ttqt', 'level']));
    }

    /**
     * Show the form for editing the specified Ttqt.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ttqt = $this->ttqtRepository->find($id);

        if (empty($ttqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
        }
        $ttqt->ngay_ky = date_format(new \DateTime($ttqt->ngay_ky), 'd/m/Y') ?? '';
        $ttqt->ngay_hieu_luc = date_format(new \DateTime($ttqt->ngay_hieu_luc), 'd/m/Y') ?? '';
        $quoc_gias = DmQuocGia::all();
        $loai_vbs = DmLoaiVanBan::all();
        $level = $this->level;
        return view('ttqts.edit', compact('ttqt', 'level', 'quoc_gias', 'loai_vbs'));
    }

    /**
     * Update the specified Ttqt in storage.
     *
     * @param  int              $id
     * @param UpdateTtqtRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTtqtRequest $request)
    {
        $ttqt = $this->ttqtRepository->find($id);

        if (empty($ttqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
        }
        $input = $request->all();
        $ngay_ky = \DateTime::createFromFormat('d/m/Y', $input['ngay_ky']);
        $input['ngay_ky'] =  $ngay_ky->format('Y-m-d');

        $ngay_hieu_luc = \DateTime::createFromFormat('d/m/Y', $input['ngay_hieu_luc']);
        $input['ngay_hieu_luc'] =  $ngay_hieu_luc->format('Y-m-d');

        if (isset($input['uy_quyen'])) {
            $input['uy_quyen'] = 1;
        }
        else {
            $input['uy_quyen'] = 0;
        }

        $ttqt = $this->ttqtRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
    }

    /**
     * Remove the specified Ttqt from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ttqt = $this->ttqtRepository->find($id);

        if (empty($ttqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
        }

        $this->ttqtRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route(Ttqt::ROUTE_NAME[$this->level].'.index'));
    }
}
