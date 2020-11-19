<?php

namespace App\Http\Controllers;

use App\DataTables\NgHgVeNuocDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNgHgVeNuocRequest;
use App\Http\Requests\UpdateNgHgVeNuocRequest;
use App\Repositories\NgHgVeNuocRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NgHgVeNuocController extends AppBaseController
{
    /** @var  NgHgVeNuocRepository */
    private $ngHgVeNuocRepository;

    public function __construct(NgHgVeNuocRepository $ngHgVeNuocRepo)
    {
        $this->ngHgVeNuocRepository = $ngHgVeNuocRepo;
    }

    /**
     * Display a listing of the NgHgVeNuoc.
     *
     * @param NgHgVeNuocDataTable $ngHgVeNuocDataTable
     * @return Response
     */
    public function index(NgHgVeNuocDataTable $ngHgVeNuocDataTable)
    {
        return $ngHgVeNuocDataTable->render('ng_hg_ve_nuocs.index');
    }

    /**
     * Show the form for creating a new NgHgVeNuoc.
     *
     * @return Response
     */
    public function create()
    {
        return view('ng_hg_ve_nuocs.create');
    }

    /**
     * Store a newly created NgHgVeNuoc in storage.
     *
     * @param CreateNgHgVeNuocRequest $request
     *
     * @return Response
     */
    public function store(CreateNgHgVeNuocRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_gian']);
        $input['thoi_gian'] =  $date->format('Y-m-d');

        $ngHgVeNuoc = $this->ngHgVeNuocRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('ngHgVeNuocs.index'));
    }

    /**
     * Display the specified NgHgVeNuoc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ngHgVeNuoc = $this->ngHgVeNuocRepository->find($id);

        if (empty($ngHgVeNuoc)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgVeNuocs.index'));
        }

        return view('ng_hg_ve_nuocs.show')->with('ngHgVeNuoc', $ngHgVeNuoc);
    }

    /**
     * Show the form for editing the specified NgHgVeNuoc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ngHgVeNuoc = $this->ngHgVeNuocRepository->find($id);

        if (empty($ngHgVeNuoc)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgVeNuocs.index'));
        }
        $ngHgVeNuoc->thoi_gian = date_format(new \DateTime($ngHgVeNuoc->thoi_gian), 'd/m/Y') ?? '';

        return view('ng_hg_ve_nuocs.edit')->with('ngHgVeNuoc', $ngHgVeNuoc);
    }

    /**
     * Update the specified NgHgVeNuoc in storage.
     *
     * @param  int              $id
     * @param UpdateNgHgVeNuocRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNgHgVeNuocRequest $request)
    {
        $ngHgVeNuoc = $this->ngHgVeNuocRepository->find($id);

        if (empty($ngHgVeNuoc)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgVeNuocs.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_gian']);
        $input['thoi_gian'] =  $date->format('Y-m-d');

        $ngHgVeNuoc = $this->ngHgVeNuocRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('ngHgVeNuocs.index'));
    }

    /**
     * Remove the specified NgHgVeNuoc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ngHgVeNuoc = $this->ngHgVeNuocRepository->find($id);

        if (empty($ngHgVeNuoc)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('ngHgVeNuocs.index'));
        }

        $this->ngHgVeNuocRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('ngHgVeNuocs.index'));
    }
}
