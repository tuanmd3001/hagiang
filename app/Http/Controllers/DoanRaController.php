<?php

namespace App\Http\Controllers;

use App\DataTables\DoanRaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDoanRaRequest;
use App\Http\Requests\UpdateDoanRaRequest;
use App\Models\CanBo;
use App\Models\Danh_Muc\DmLoaiKinhPhi;
use App\Models\Danh_Muc\DmQuocGia;
use App\Models\DoanRa;
use App\Models\DoanRaThanhVien;
use App\Repositories\DoanRaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Response;

class DoanRaController extends AppBaseController
{
    /** @var  DoanRaRepository */
    private $doanRaRepository;
    private $level;

    public function __construct(DoanRaRepository $doanRaRepo)
    {
        $this->doanRaRepository = $doanRaRepo;
        $level = DoanRa::LEVEL_TINH;
        if (\Request::is("doanRaCapHuyen*")){
            $level = DoanRa::LEVEL_HUYEN;
        }
        elseif (\Request::is("doanRaCapXa*")){
            $level = DoanRa::LEVEL_XA;
        }
        $this->level = $level;
    }

    /**
     * Display a listing of the DoanRa.
     *
     * @param DoanRaDataTable $doanRaDataTable
     * @return Response
     */
    public function index()
    {
        $level = $this->level;
        $doanRaDataTable = new DoanRaDataTable($level);
        return $doanRaDataTable->render('doan_ras.index', compact("level"));
    }

    /**
     * Show the form for creating a new DoanRa.
     *
     * @return Response
     */
    public function create()
    {
        $quoc_gias = DmQuocGia::all();
        $kinh_phis = DmLoaiKinhPhi::all();
        $level = $this->level;
        $can_bos = CanBo::all();

        return view('doan_ras.create', compact("quoc_gias", "kinh_phis", 'level', 'can_bos'));
    }

    /**
     * Store a newly created DoanRa in storage.
     *
     * @param CreateDoanRaRequest $request
     *
     * @return Response
     */
    public function store(CreateDoanRaRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_gian']);
        $input['thoi_gian'] =  $date->format('Y-m-d');
        if (isset($input['trong_kh'])) {
            $input['trong_kh'] = 1;
        }
        else {
            $input['trong_kh'] = 0;
        }
        $input['level'] = $this->level;

        DB::beginTransaction();
        try {
            $doanRa = $this->doanRaRepository->create($input);

            foreach ($input['members'] as $member_json){
                $member_info = json_decode($member_json);
                $ngay_sinh = \DateTime::createFromFormat('d/m/Y', $member_info->ngay_sinh);
                $new_mem = [
                    'doan_ra_id' => $doanRa->id,
                    'can_bo_id' => null,
                    'ten' => $member_info->ten ,
                    'ngay_sinh' => $ngay_sinh->format('Y-m-d'),
                    'gioi_tinh' => $member_info->gioi_tinh ,
                    'sdt' => $member_info->sdt ,
                    'email' => $member_info->email,
                    'noi_cong_tac' => $member_info->noi_cong_tac,
                    'noi_o' => $member_info->noi_o,
                ];
                if (property_exists($member_info, "save_canBo")){
                    if ($member_info->save_canBo == 2){
                        // chọn từ danh sách cán bộ
                        $new_mem['can_bo_id'] = $member_info->id;
                        $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->tempId ? 1 : 0;
                    }
                    elseif ($member_info->save_canBo == 1){
                        // Nhập mới và lưu
                        $new_canBo = CanBo::create($new_mem);
                        $new_mem['can_bo_id'] = $new_canBo->id;
                        $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->id ? 1 : 0;
                    }
                    else {
                        // Nhập mới không lưu
                        $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->id ? 1 : 0;
                    }
                }
                else {
                    // đã chọn từ trước
                    $new_mem['can_bo_id'] = $member_info->can_bo_id;
                    $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->id ? 1 : 0;
                }
                DoanRaThanhVien::create($new_mem);
            }
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->withErrors([
                'system' => 'Có lỗi xảy ra, vui lòng thử lại ('. $exception->getMessage() . ")"
            ])->withInput($input);
        }

        Flash::success('Thêm mới đoàn ra thành công.');

        return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
    }

    /**
     * Display the specified DoanRa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doanRa = $this->doanRaRepository->find($id);

        if (empty($doanRa)) {
            Flash::error('Không tìm thấy thông tin đoàn ra');

            return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
        }

        $level = $this->level;
        $thanh_viens = DoanRaThanhVien::where('doan_ra_id', $doanRa->id)->get();

        return view('doan_ras.show', compact('doanRa', 'level', 'thanh_viens'));
    }

    /**
     * Show the form for editing the specified DoanRa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $doanRa = $this->doanRaRepository->find($id);

        if (empty($doanRa)) {
            Flash::error('Không tìm thấy thông tin đoàn ra');

            return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
        }
        $quoc_gias = DmQuocGia::all();
        $kinh_phis = DmLoaiKinhPhi::all();
        $can_bos = CanBo::all();
        $thanh_viens = DoanRaThanhVien::where('doan_ra_id', $doanRa->id)->get();
        $level = $this->level;
        $doanRa->thoi_gian = date_format(new \DateTime($doanRa->thoi_gian), 'd/m/Y') ?? '';

        return view('doan_ras.edit', compact("doanRa", "quoc_gias", "kinh_phis", 'level', 'can_bos', 'thanh_viens'));
    }

    /**
     * Update the specified DoanRa in storage.
     *
     * @param  int              $id
     * @param UpdateDoanRaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDoanRaRequest $request)
    {
        $doanRa = $this->doanRaRepository->find($id);

        if (empty($doanRa)) {
            Flash::error('Không tìm thấy thông tin đoàn ra');

            return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_gian']);
        $input['thoi_gian'] =  $date->format('Y-m-d');
        if (isset($input['trong_kh'])) {
            $input['trong_kh'] = 1;
        }
        else {
            $input['trong_kh'] = 0;
        }
        DB::beginTransaction();
        try {
            $doanRa = $this->doanRaRepository->update($input, $id);
            DoanRaThanhVien::where('doan_ra_id', $id)->delete();
            foreach ($input['members'] as $member_json){
                $member_info = json_decode($member_json);
                $ngay_sinh = \DateTime::createFromFormat('d/m/Y', $member_info->ngay_sinh);
                $new_mem = [
                    'doan_ra_id' => $doanRa->id,
                    'can_bo_id' => null,
                    'ten' => $member_info->ten ,
                    'ngay_sinh' => $ngay_sinh->format('Y-m-d'),
                    'gioi_tinh' => $member_info->gioi_tinh ,
                    'sdt' => $member_info->sdt ,
                    'email' => $member_info->email,
                    'noi_cong_tac' => $member_info->noi_cong_tac,
                    'noi_o' => $member_info->noi_o,
                ];
                if (property_exists($member_info, "save_canBo")){
                    if ($member_info->save_canBo == 2){
                        // chọn từ danh sách cán bộ
                        $new_mem['can_bo_id'] = $member_info->id;
                        $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->tempId ? 1 : 0;
                    }
                    elseif ($member_info->save_canBo == 1){
                        // Nhập mới và lưu
                        $new_canBo = CanBo::create($new_mem);
                        $new_mem['can_bo_id'] = $new_canBo->id;
                        $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->id ? 1 : 0;
                    }
                    else {
                        // Nhập mới không lưu
                        $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->id ? 1 : 0;
                    }
                }
                else {
                    // đã chọn từ trước
                    $new_mem['can_bo_id'] = $member_info->can_bo_id;
                    $new_mem['truong_doan'] = $input['truong_doan'] == $member_info->id ? 1 : 0;
                }
                DoanRaThanhVien::create($new_mem);
            }
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->withErrors([
                'system' => 'Có lỗi xảy ra, vui lòng thử lại ('. $exception->getMessage() . ")"
            ])->withInput($input);
        }

        Flash::success('Cập nhật thông tin đoàn ra thành công.');

        return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
    }

    /**
     * Remove the specified DoanRa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doanRa = $this->doanRaRepository->find($id);

        if (empty($doanRa)) {
            Flash::error('Không tìm thấy thông tin đoàn ra');

            return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
        }

        $this->doanRaRepository->delete($id);

        Flash::success('Xóa thông tin đoàn ra thành công.');

        return redirect(route(DoanRa::ROUTE_NAME[$this->level].'.index'));
    }
}
