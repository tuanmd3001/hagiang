<?php

namespace App\Http\Controllers;

use App\DataTables\BhNgNuocNgoaiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBhNgNuocNgoaiRequest;
use App\Http\Requests\UpdateBhNgNuocNgoaiRequest;
use App\Models\Danh_Muc\DmQuocGia;
use App\Repositories\BhNgNuocNgoaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BhNgNuocNgoaiController extends AppBaseController
{
    /** @var  BhNgNuocNgoaiRepository */
    private $bhNgNuocNgoaiRepository;

    public function __construct(BhNgNuocNgoaiRepository $bhNgNuocNgoaiRepo)
    {
        $this->bhNgNuocNgoaiRepository = $bhNgNuocNgoaiRepo;
    }

    /**
     * Display a listing of the BhNgNuocNgoai.
     *
     * @param BhNgNuocNgoaiDataTable $bhNgNuocNgoaiDataTable
     * @return Response
     */
    public function index(BhNgNuocNgoaiDataTable $bhNgNuocNgoaiDataTable)
    {
        return $bhNgNuocNgoaiDataTable->render('bh_ng_nuoc_ngoais.index');
    }

    /**
     * Show the form for creating a new BhNgNuocNgoai.
     *
     * @return Response
     */
    public function create()
    {
        $quoc_gias = DmQuocGia::all();
        return view('bh_ng_nuoc_ngoais.create', compact('quoc_gias'));
    }

    /**
     * Store a newly created BhNgNuocNgoai in storage.
     *
     * @param CreateBhNgNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function store(CreateBhNgNuocNgoaiRequest $request)
    {
        $input = $request->all();

        $bhNgNuocNgoai = $this->bhNgNuocNgoaiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('bhNgNuocNgoais.index'));
    }

    /**
     * Display the specified BhNgNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bhNgNuocNgoai = $this->bhNgNuocNgoaiRepository->find($id);

        if (empty($bhNgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('bhNgNuocNgoais.index'));
        }

        return view('bh_ng_nuoc_ngoais.show')->with('bhNgNuocNgoai', $bhNgNuocNgoai);
    }

    /**
     * Show the form for editing the specified BhNgNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bhNgNuocNgoai = $this->bhNgNuocNgoaiRepository->find($id);

        if (empty($bhNgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('bhNgNuocNgoais.index'));
        }
        $quoc_gias = DmQuocGia::all();

        return view('bh_ng_nuoc_ngoais.edit', compact('bhNgNuocNgoai', 'quoc_gias'));
    }

    /**
     * Update the specified BhNgNuocNgoai in storage.
     *
     * @param  int              $id
     * @param UpdateBhNgNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBhNgNuocNgoaiRequest $request)
    {
        $bhNgNuocNgoai = $this->bhNgNuocNgoaiRepository->find($id);

        if (empty($bhNgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('bhNgNuocNgoais.index'));
        }

        $bhNgNuocNgoai = $this->bhNgNuocNgoaiRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('bhNgNuocNgoais.index'));
    }

    /**
     * Remove the specified BhNgNuocNgoai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bhNgNuocNgoai = $this->bhNgNuocNgoaiRepository->find($id);

        if (empty($bhNgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('bhNgNuocNgoais.index'));
        }

        $this->bhNgNuocNgoaiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('bhNgNuocNgoais.index'));
    }
}
