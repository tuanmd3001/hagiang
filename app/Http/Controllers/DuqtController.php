<?php

namespace App\Http\Controllers;

use App\DataTables\DuqtDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDuqtRequest;
use App\Http\Requests\UpdateDuqtRequest;
use App\Models\Danh_Muc\DmLoaiVanBan;
use App\Models\Danh_Muc\DmQuocGia;
use App\Repositories\DuqtRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DuqtController extends AppBaseController
{
    /** @var  DuqtRepository */
    private $duqtRepository;

    public function __construct(DuqtRepository $duqtRepo)
    {
        $this->duqtRepository = $duqtRepo;
    }

    /**
     * Display a listing of the Duqt.
     *
     * @param DuqtDataTable $duqtDataTable
     * @return Response
     */
    public function index(DuqtDataTable $duqtDataTable)
    {
        return $duqtDataTable->render('duqts.index');
    }

    /**
     * Show the form for creating a new Duqt.
     *
     * @return Response
     */
    public function create()
    {
        $quoc_gias = DmQuocGia::all();
        $loai_vbs = DmLoaiVanBan::all();
        return view('duqts.create', compact('quoc_gias', 'loai_vbs'));
    }

    /**
     * Store a newly created Duqt in storage.
     *
     * @param CreateDuqtRequest $request
     *
     * @return Response
     */
    public function store(CreateDuqtRequest $request)
    {
        $input = $request->all();

        $ngay_ky = \DateTime::createFromFormat('d/m/Y', $input['ngay_ky']);
        $input['ngay_ky'] =  $ngay_ky->format('Y-m-d');

        $ngay_hieu_luc = \DateTime::createFromFormat('d/m/Y', $input['ngay_hieu_luc']);
        $input['ngay_hieu_luc'] =  $ngay_hieu_luc->format('Y-m-d');

        if (isset($input['trong_kh'])) {
            $input['trong_kh'] = 1;
        }
        else {
            $input['trong_kh'] = 0;
        }

        $duqt = $this->duqtRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('duqts.index'));
    }

    /**
     * Display the specified Duqt.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $duqt = $this->duqtRepository->find($id);

        if (empty($duqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duqts.index'));
        }

        return view('duqts.show')->with('duqt', $duqt);
    }

    /**
     * Show the form for editing the specified Duqt.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $duqt = $this->duqtRepository->find($id);

        if (empty($duqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duqts.index'));
        }
        $duqt->ngay_ky = date_format(new \DateTime($duqt->ngay_ky), 'd/m/Y') ?? '';
        $duqt->ngay_hieu_luc = date_format(new \DateTime($duqt->ngay_hieu_luc), 'd/m/Y') ?? '';
        $quoc_gias = DmQuocGia::all();
        $loai_vbs = DmLoaiVanBan::all();

        return view('duqts.edit', compact('duqt', 'quoc_gias', 'loai_vbs'));
    }

    /**
     * Update the specified Duqt in storage.
     *
     * @param  int              $id
     * @param UpdateDuqtRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDuqtRequest $request)
    {
        $duqt = $this->duqtRepository->find($id);

        if (empty($duqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duqts.index'));
        }
        $input = $request->all();
        $ngay_ky = \DateTime::createFromFormat('d/m/Y', $input['ngay_ky']);
        $input['ngay_ky'] =  $ngay_ky->format('Y-m-d');

        $ngay_hieu_luc = \DateTime::createFromFormat('d/m/Y', $input['ngay_hieu_luc']);
        $input['ngay_hieu_luc'] =  $ngay_hieu_luc->format('Y-m-d');

        if (isset($input['trong_kh'])) {
            $input['trong_kh'] = 1;
        }
        else {
            $input['trong_kh'] = 0;
        }

        $duqt = $this->duqtRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('duqts.index'));
    }

    /**
     * Remove the specified Duqt from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $duqt = $this->duqtRepository->find($id);

        if (empty($duqt)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duqts.index'));
        }

        $this->duqtRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('duqts.index'));
    }
}
