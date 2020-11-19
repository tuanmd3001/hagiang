<?php

namespace App\Http\Controllers;

use App\DataTables\LopDaoTaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLopDaoTaoRequest;
use App\Http\Requests\UpdateLopDaoTaoRequest;
use App\Models\Danh_Muc\DmLoaiKinhPhi;
use App\Models\LopDaoTao;
use App\Models\LopDaoTaoThanhVien;
use App\Repositories\LopDaoTaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Response;

class LopDaoTaoController extends AppBaseController
{
    /** @var  LopDaoTaoRepository */
    private $lopDaoTaoRepository;
    private $class_type;

    public function __construct(LopDaoTaoRepository $lopDaoTaoRepo)
    {
        $this->lopDaoTaoRepository = $lopDaoTaoRepo;
        $this->class_type = LopDaoTao::TYPE_LOP_DAO_TAO;
        if (\Request::is(LopDaoTao::ROUTE_NAME[LopDaoTao::TYPE_DAO_TAO_NUOC_NGOAI] . "*")){
            $this->class_type = LopDaoTao::TYPE_DAO_TAO_NUOC_NGOAI;
        }
        elseif (\Request::is(LopDaoTao::ROUTE_NAME[LopDaoTao::TYPE_LOP_TUYEN_TRUYEN] . "*")){
            $this->class_type = LopDaoTao::TYPE_LOP_TUYEN_TRUYEN;
        }
    }

    /**
     * Display a listing of the LopDaoTao.
     *
     * @param LopDaoTaoDataTable $lopDaoTaoDataTable
     * @return Response
     */
    public function index(LopDaoTaoDataTable $lopDaoTaoDataTable)
    {
        $class_type = $this->class_type;
        $datatable = new LopDaoTaoDataTable($class_type);
        return $datatable->render('lop_dao_taos.index', compact('class_type'));
    }

    /**
     * Show the form for creating a new LopDaoTao.
     *
     * @return Response
     */
    public function create()
    {
        $class_type = $this->class_type;
        $kinh_phis = DmLoaiKinhPhi::all();
        return view('lop_dao_taos.create', compact('class_type', 'kinh_phis'));
    }

    /**
     * Store a newly created LopDaoTao in storage.
     *
     * @param CreateLopDaoTaoRequest $request
     *
     * @return Response
     */
    public function store(CreateLopDaoTaoRequest $request)
    {
        $input = $request->all();
        $input['type'] = $this->class_type;
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_gian']);
        $input['thoi_gian'] =  $date->format('Y-m-d');

        DB::beginTransaction();
        try {
            $lopDaoTao = $this->lopDaoTaoRepository->create($input);
            if (isset($input['members'])){
                foreach ($input['members'] as $member_json){
                    $member_info = json_decode($member_json);
                    if (!isset($member_info->id)){
                        $ngay_sinh = \DateTime::createFromFormat('d/m/Y', $member_info->ngay_sinh);
                        $new_mem_info = [
                            'lop_id' => $lopDaoTao->id,
                            'ten' => $member_info->ten ,
                            'ngay_sinh' => $ngay_sinh->format('Y-m-d'),
                            'gioi_tinh' => $member_info->gioi_tinh ,
                            'sdt' => $member_info->sdt ,
                            'email' => $member_info->email,
                        ];
                        LopDaoTaoThanhVien::create($new_mem_info);
                    }
                }
            }
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->withErrors([
                'system' => 'Có lỗi xảy ra, vui lòng thử lại ('. $exception->getMessage() . ")"
            ])->withInput($input);
        }

        Flash::success('Thêm mới thành công');

        return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
    }

    /**
     * Display the specified LopDaoTao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lopDaoTao = $this->lopDaoTaoRepository->find($id);

        if (empty($lopDaoTao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
        }
        $class_type = $this->class_type;
        $thanh_viens = LopDaoTaoThanhVien::where('lop_id', $lopDaoTao->id)->get();

        return view('lop_dao_taos.show', compact('lopDaoTao', 'class_type', 'thanh_viens'));
    }

    /**
     * Show the form for editing the specified LopDaoTao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lopDaoTao = $this->lopDaoTaoRepository->find($id);

        if (empty($lopDaoTao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
        }

        $class_type = $this->class_type;
        $kinh_phis = DmLoaiKinhPhi::all();
        $lopDaoTao->thoi_gian = date_format(new \DateTime($lopDaoTao->thoi_gian), 'd/m/Y') ?? '';

        $thanh_viens = LopDaoTaoThanhVien::where('lop_id', $lopDaoTao->id)->get();

        return view('lop_dao_taos.edit', compact('lopDaoTao', 'class_type', 'kinh_phis', 'thanh_viens'));
    }

    /**
     * Update the specified LopDaoTao in storage.
     *
     * @param  int              $id
     * @param UpdateLopDaoTaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLopDaoTaoRequest $request)
    {
        $lopDaoTao = $this->lopDaoTaoRepository->find($id);

        if (empty($lopDaoTao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_gian']);
        $input['thoi_gian'] =  $date->format('Y-m-d');
        DB::beginTransaction();
        try {
            $lopDaoTao = $this->lopDaoTaoRepository->update($input, $id);
            $keepMembers = [];
            if (isset($input['members'])){
                foreach ($input['members'] as $member_json){
                    $member_info = json_decode($member_json);
                    if (!isset($member_info->id)){
                        $ngay_sinh = \DateTime::createFromFormat('d/m/Y', $member_info->ngay_sinh);
                        $new_mem_info = [
                            'lop_id' => $lopDaoTao->id,
                            'ten' => $member_info->ten ,
                            'ngay_sinh' => $ngay_sinh->format('Y-m-d'),
                            'gioi_tinh' => $member_info->gioi_tinh ,
                            'sdt' => $member_info->sdt ,
                            'email' => $member_info->email,
                        ];
                        $new_mem = LopDaoTaoThanhVien::create($new_mem_info);
                        $keepMembers[] = $new_mem->id;
                    }
                    else {
                        $keepMembers[] = $member_info->id;
                    }
                }
            }
            LopDaoTaoThanhVien::whereNotIn('id', $keepMembers)->delete();
            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            return Redirect::back()->withErrors([
                'system' => 'Có lỗi xảy ra, vui lòng thử lại ('. $exception->getMessage() . ")"
            ])->withInput($input);
        }

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
    }

    /**
     * Remove the specified LopDaoTao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lopDaoTao = $this->lopDaoTaoRepository->find($id);

        if (empty($lopDaoTao)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
        }

        $this->lopDaoTaoRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route(LopDaoTao::ROUTE_NAME[$this->class_type] . '.index'));
    }
}
