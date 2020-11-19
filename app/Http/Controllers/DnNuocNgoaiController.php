<?php

namespace App\Http\Controllers;

use App\DataTables\DnNuocNgoaiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDnNuocNgoaiRequest;
use App\Http\Requests\UpdateDnNuocNgoaiRequest;
use App\Repositories\DnNuocNgoaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DnNuocNgoaiController extends AppBaseController
{
    /** @var  DnNuocNgoaiRepository */
    private $dnNuocNgoaiRepository;

    public function __construct(DnNuocNgoaiRepository $dnNuocNgoaiRepo)
    {
        $this->dnNuocNgoaiRepository = $dnNuocNgoaiRepo;
    }

    /**
     * Display a listing of the DnNuocNgoai.
     *
     * @param DnNuocNgoaiDataTable $dnNuocNgoaiDataTable
     * @return Response
     */
    public function index(DnNuocNgoaiDataTable $dnNuocNgoaiDataTable)
    {
        return $dnNuocNgoaiDataTable->render('dn_nuoc_ngoais.index');
    }

    /**
     * Show the form for creating a new DnNuocNgoai.
     *
     * @return Response
     */
    public function create()
    {
        return view('dn_nuoc_ngoais.create');
    }

    /**
     * Store a newly created DnNuocNgoai in storage.
     *
     * @param CreateDnNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function store(CreateDnNuocNgoaiRequest $request)
    {
        $input = $request->all();

        $dnNuocNgoai = $this->dnNuocNgoaiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('dnNuocNgoais.index'));
    }

    /**
     * Display the specified DnNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dnNuocNgoai = $this->dnNuocNgoaiRepository->find($id);

        if (empty($dnNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('dnNuocNgoais.index'));
        }

        return view('dn_nuoc_ngoais.show')->with('dnNuocNgoai', $dnNuocNgoai);
    }

    /**
     * Show the form for editing the specified DnNuocNgoai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dnNuocNgoai = $this->dnNuocNgoaiRepository->find($id);

        if (empty($dnNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('dnNuocNgoais.index'));
        }

        return view('dn_nuoc_ngoais.edit')->with('dnNuocNgoai', $dnNuocNgoai);
    }

    /**
     * Update the specified DnNuocNgoai in storage.
     *
     * @param  int              $id
     * @param UpdateDnNuocNgoaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDnNuocNgoaiRequest $request)
    {
        $dnNuocNgoai = $this->dnNuocNgoaiRepository->find($id);

        if (empty($dnNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('dnNuocNgoais.index'));
        }

        $dnNuocNgoai = $this->dnNuocNgoaiRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('dnNuocNgoais.index'));
    }

    /**
     * Remove the specified DnNuocNgoai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dnNuocNgoai = $this->dnNuocNgoaiRepository->find($id);

        if (empty($dnNuocNgoai)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('dnNuocNgoais.index'));
        }

        $this->dnNuocNgoaiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('dnNuocNgoais.index'));
    }
}
