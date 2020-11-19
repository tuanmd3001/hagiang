<?php

namespace App\Http\Controllers;

use App\DataTables\NgHgNuocNgoaiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNgHgNuocNgoaiRequest;
use App\Http\Requests\UpdateNgHgNuocNgoaiRequest;
use App\Repositories\NgHgNuocNgoaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NgHgNuocNgoaiController extends AppBaseController
{
    /** @var  NgHgNuocNgoaiRepository */
    private $ngHgNuocNgoaiRepository;

    public function __construct(NgHgNuocNgoaiRepository $ngHgNuocNgoaiRepo)
    {
        $this->ngHgNuocNgoaiRepository = $ngHgNuocNgoaiRepo;
    }

    /**
     * Display a listing of the NgHgNuocNgoai.
     *
     * @param NgHgNuocNgoaiDataTable $ngHgNuocNgoaiDataTable
     * @return Response
     */
    public function index(NgHgNuocNgoaiDataTable $ngHgNuocNgoaiDataTable)
    {
        return $ngHgNuocNgoaiDataTable->render('ng_hg_nuoc_ngoais.index');
    }

    /**
     * Show the form for creating a new NgHgNuocNgoai.
     *
     * @return Response
     */
    public function create()
    {
        return view('ng_hg_nuoc_ngoais.create');
    }

    /**
     * Store a newly created NgHgNuocNgoai in storage.
     *
     * @param CreateNgHgNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function store(CreateNgHgNuocNgoaiRequest $request)
    {
        $input = $request->all();

        $ngHgNuocNgoai = $this->ngHgNuocNgoaiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('ngHgNuocNgoais.index'));
    }

    /**
     * Display the specified NgHgNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ngHgNuocNgoai = $this->ngHgNuocNgoaiRepository->find($id);

        if (empty($ngHgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgNuocNgoais.index'));
        }

        return view('ng_hg_nuoc_ngoais.show')->with('ngHgNuocNgoai', $ngHgNuocNgoai);
    }

    /**
     * Show the form for editing the specified NgHgNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ngHgNuocNgoai = $this->ngHgNuocNgoaiRepository->find($id);

        if (empty($ngHgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgNuocNgoais.index'));
        }

        return view('ng_hg_nuoc_ngoais.edit')->with('ngHgNuocNgoai', $ngHgNuocNgoai);
    }

    /**
     * Update the specified NgHgNuocNgoai in storage.
     *
     * @param  int              $id
     * @param UpdateNgHgNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNgHgNuocNgoaiRequest $request)
    {
        $ngHgNuocNgoai = $this->ngHgNuocNgoaiRepository->find($id);

        if (empty($ngHgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgNuocNgoais.index'));
        }

        $ngHgNuocNgoai = $this->ngHgNuocNgoaiRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('ngHgNuocNgoais.index'));
    }

    /**
     * Remove the specified NgHgNuocNgoai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ngHgNuocNgoai = $this->ngHgNuocNgoaiRepository->find($id);

        if (empty($ngHgNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgNuocNgoais.index'));
        }

        $this->ngHgNuocNgoaiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('ngHgNuocNgoais.index'));
    }
}
