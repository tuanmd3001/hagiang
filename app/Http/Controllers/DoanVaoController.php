<?php

namespace App\Http\Controllers;

use App\DataTables\DoanVaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDoanVaoRequest;
use App\Http\Requests\UpdateDoanVaoRequest;
use App\Models\CanBo;
use App\Models\Danh_Muc\DmLoaiKinhPhi;
use App\Models\Danh_Muc\DmQuocGia;
use App\Models\DoanVao;
use App\Models\DoanVaoThanhVien;
use App\Repositories\DoanVaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Response;

class DoanVaoController extends AppBaseController
{
    /** @var  DoanVaoRepository */
    private $doanVaoRepository;
    private $level;

    public function __construct(DoanVaoRepository $doanVaoRepo)
    {
        $this->doanVaoRepository = $doanVaoRepo;
        $level = DoanVao::LEVEL_TINH;
        if (\Request::is("doanVaoCapHuyen*")){
            $level = DoanVao::LEVEL_HUYEN;
        }
        elseif (\Request::is("doanVaoCapXa*")){
            $level = DoanVao::LEVEL_XA;
        }
        $this->level = $level;
    }

    /**
     * Display a listing of the DoanVao.
     *
     * @param DoanVaoDataTable $doanVaoDataTable
     * @return Response
     */
    public function index()
    {
        $level = $this->level;
        $doanVaoDataTable = new DoanVaoDataTable($level);
        return $doanVaoDataTable->render('doan_vaos.index', compact("level"));
    }

    /**
     * Show the form for creating a new DoanVao.
     *
     * @return Response
     */
    public function create()
    {
        $quoc_gias = DmQuocGia::all();
        $kinh_phis = DmLoaiKinhPhi::all();
        $level = $this->level;
        $can_bos = CanBo::all();

        return view('doan_vaos.create', compact("quoc_gias", "kinh_phis", 'level', 'can_bos'));
    }

    /**
     * Store a newly created DoanVao in storage.
     *
     * @param CreateDoanVaoRequest $request
     *
     * @return Response
     */
    public function store(CreateDoanVaoRequest $request)
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
            $doanVao = $this->doanVaoRepository->create($input);

            foreach ($input['members'] as $member_json){
                $member_info = json_decode($member_json);
                $ngay_sinh = \DateTime::createFromFormat('d/m/Y', $member_info->ngay_sinh);
                $new_mem = [
                    'doan_vao_id' => $doanVao->id,
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
                DoanVaoThanhVien::create($new_mem);
            }
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->withErrors([
                'system' => 'Có lỗi xảy ra, vui lòng thử lại ('. $exception->getMessage() . ")"
            ])->withInput($input);
        }

        Flash::success('Thêm mới đoàn vào thành công.');

        return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
    }

    /**
     * Display the specified DoanVao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $doanVao = $this->doanVaoRepository->find($id);

        if (empty($doanVao)) {
            Flash::error('Không tìm thấy thông tin đoàn vào');

            return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
        }

        $level = $this->level;
        $thanh_viens = DoanVaoThanhVien::where('doan_vao_id', $doanVao->id)->get();

        return view('doan_vaos.show', compact('doanVao', 'level', 'thanh_viens'));
    }

    /**
     * Show the form for editing the specified DoanVao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $doanVao = $this->doanVaoRepository->find($id);

        if (empty($doanVao)) {
            Flash::error('Không tìm thấy thông tin đoàn vào');

            return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
        }
        $quoc_gias = DmQuocGia::all();
        $kinh_phis = DmLoaiKinhPhi::all();
        $can_bos = CanBo::all();
        $thanh_viens = DoanVaoThanhVien::where('doan_vao_id', $doanVao->id)->get();
        $level = $this->level;
        $doanVao->thoi_gian = date_format(new \DateTime($doanVao->thoi_gian), 'd/m/Y') ?? '';

        return view('doan_vaos.edit', compact("doanVao", "quoc_gias", "kinh_phis", 'level', 'can_bos', 'thanh_viens'));
    }

    /**
     * Update the specified DoanVao in storage.
     *
     * @param  int              $id
     * @param UpdateDoanVaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDoanVaoRequest $request)
    {
        $doanVao = $this->doanVaoRepository->find($id);

        if (empty($doanVao)) {
            Flash::error('Không tìm thấy thông tin đoàn vào');

            return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
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
            $doanVao = $this->doanVaoRepository->update($input, $id);
            DoanVaoThanhVien::where('doan_vao_id', $id)->delete();
            foreach ($input['members'] as $member_json){
                $member_info = json_decode($member_json);
                $ngay_sinh = \DateTime::createFromFormat('d/m/Y', $member_info->ngay_sinh);
                $new_mem = [
                    'doan_vao_id' => $doanVao->id,
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
                DoanVaoThanhVien::create($new_mem);
            }
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->withErrors([
                'system' => 'Có lỗi xảy ra, vui lòng thử lại ('. $exception->getMessage() . ")"
            ])->withInput($input);
        }

        Flash::success('Cập nhật thông tin đoàn vào thành công.');

        return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
    }

    /**
     * Remove the specified DoanVao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $doanVao = $this->doanVaoRepository->find($id);

        if (empty($doanVao)) {
            Flash::error('Không tìm thấy thông tin đoàn vào');

            return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
        }

        $this->doanVaoRepository->delete($id);

        Flash::success('Xóa thông tin đoàn vào thành công.');

        return redirect(route(DoanVao::ROUTE_NAME[$this->level].'.index'));
    }
}
