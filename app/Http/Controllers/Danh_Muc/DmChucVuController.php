<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmChucVuDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmChucVuRequest;
use App\Http\Requests\Danh_Muc\UpdateDmChucVuRequest;
use App\Repositories\Danh_Muc\DmChucVuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmChucVuController extends AppBaseController
{
    /** @var  DmChucVuRepository */
    private $dmChucVuRepository;

    public function __construct(DmChucVuRepository $dmChucVuRepo)
    {
        $this->dmChucVuRepository = $dmChucVuRepo;
    }

    /**
     * Display a listing of the DmChucVu.
     *
     * @param DmChucVuDataTable $dmChucVuDataTable
     * @return Response
     */
    public function index(DmChucVuDataTable $dmChucVuDataTable)
    {
        return $dmChucVuDataTable->render('danhMuc.chuc_vu.index');
    }

    /**
     * Show the form for creating a new DmChucVu.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.chuc_vu.create');
    }

    /**
     * Store a newly created DmChucVu in storage.
     *
     * @param CreateDmChucVuRequest $request
     *
     * @return Response
     */
    public function store(CreateDmChucVuRequest $request)
    {
        $input = $request->all();

        $dmChucVu = $this->dmChucVuRepository->create($input);

        Flash::success('Dm Chuc Vu saved successfully.');

        return redirect(route('danhMuc.chucVu.index'));
    }

    /**
     * Display the specified DmChucVu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmChucVu = $this->dmChucVuRepository->find($id);

        if (empty($dmChucVu)) {
            Flash::error('Dm Chuc Vu not found');

            return redirect(route('danhMuc.chucVu.index'));
        }

        return view('danhMuc.chuc_vu.show')->with('dmChucVu', $dmChucVu);
    }

    /**
     * Show the form for editing the specified DmChucVu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmChucVu = $this->dmChucVuRepository->find($id);

        if (empty($dmChucVu)) {
            Flash::error('Dm Chuc Vu not found');

            return redirect(route('danhMuc.chucVu.index'));
        }

        return view('danhMuc.chuc_vu.edit')->with('dmChucVu', $dmChucVu);
    }

    /**
     * Update the specified DmChucVu in storage.
     *
     * @param  int              $id
     * @param UpdateDmChucVuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmChucVuRequest $request)
    {
        $dmChucVu = $this->dmChucVuRepository->find($id);

        if (empty($dmChucVu)) {
            Flash::error('Dm Chuc Vu not found');

            return redirect(route('danhMuc.chucVu.index'));
        }

        $dmChucVu = $this->dmChucVuRepository->update($request->all(), $id);

        Flash::success('Dm Chuc Vu updated successfully.');

        return redirect(route('danhMuc.chucVu.index'));
    }

    /**
     * Remove the specified DmChucVu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmChucVu = $this->dmChucVuRepository->find($id);

        if (empty($dmChucVu)) {
            Flash::error('Dm Chuc Vu not found');

            return redirect(route('danhMuc.chucVu.index'));
        }

        $this->dmChucVuRepository->delete($id);

        Flash::success('Dm Chuc Vu deleted successfully.');

        return redirect(route('danhMuc.chucVu.index'));
    }
}
