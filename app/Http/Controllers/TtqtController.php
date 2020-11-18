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
    private $level = Ttqt::LEVEL_TINH;

    public function __construct(TtqtRepository $ttqtRepo)
    {
        $this->ttqtRepository = $ttqtRepo;
        if(\Request::is('ttqt_tinh')){
            $this->level = Ttqt::LEVEL_TINH;
        }
        elseif (\Request::is('ttqt_so_nganh')){
            $this->level = Ttqt::LEVEL_SO;
        }
        elseif (\Request::is('ttqt_huyen_tp')){
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
        $datatable = new TtqtDataTable($this->level);
        $level = $this->level;

        return $datatable->render('ttqts.index', compact(['level']));
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

        if($input['danh_nghia_ky'] == Ttqt::LEVEL_TINH){
            $route = 'ttqt_tinh.index';
        }
        elseif ($input['danh_nghia_ky'] == Ttqt::LEVEL_SO){
            $route = 'ttqt_so_nganh.index';
        }
        elseif ($input['danh_nghia_ky'] == Ttqt::LEVEL_TP){
            $route = 'ttqt_huyen_tp.index';
        }
        else {
            $route = 'ttqt_tinh.index';
        }

        Flash::success('Ttqt saved successfully.');

        return redirect(route($route));
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
            Flash::error('Ttqt not found');

            return redirect(route('ttqts.index'));
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
            Flash::error('Ttqt not found');

            return redirect(route('ttqts.index'));
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
            Flash::error('Ttqt not found');

            return redirect(route('ttqts.index'));
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

        if($input['danh_nghia_ky'] == Ttqt::LEVEL_TINH){
            $route = 'ttqt_tinh.index';
        }
        elseif ($input['danh_nghia_ky'] == Ttqt::LEVEL_SO){
            $route = 'ttqt_so_nganh.index';
        }
        elseif ($input['danh_nghia_ky'] == Ttqt::LEVEL_TP){
            $route = 'ttqt_huyen_tp.index';
        }
        else {
            $route = 'ttqt_tinh.index';
        }

        Flash::success('Ttqt updated successfully.');

        return redirect(route($route));
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
            Flash::error('Ttqt not found');

            return redirect(route('ttqts.index'));
        }

        $this->ttqtRepository->delete($id);

        Flash::success('Ttqt deleted successfully.');

        return redirect(route('ttqts.index'));
    }
}
