<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmNgheNghiepDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmNgheNghiepRequest;
use App\Http\Requests\Danh_Muc\UpdateDmNgheNghiepRequest;
use App\Repositories\Danh_Muc\DmNgheNghiepRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmNgheNghiepController extends AppBaseController
{
    /** @var  DmNgheNghiepRepository */
    private $dmNgheNghiepRepository;

    public function __construct(DmNgheNghiepRepository $dmNgheNghiepRepo)
    {
        $this->dmNgheNghiepRepository = $dmNgheNghiepRepo;
    }

    /**
     * Display a listing of the DmNgheNghiep.
     *
     * @param DmNgheNghiepDataTable $dmNgheNghiepDataTable
     * @return Response
     */
    public function index(DmNgheNghiepDataTable $dmNgheNghiepDataTable)
    {
        return $dmNgheNghiepDataTable->render('danhMuc.nghe_nghiep.index');
    }

    /**
     * Show the form for creating a new DmNgheNghiep.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.nghe_nghiep.create');
    }

    /**
     * Store a newly created DmNgheNghiep in storage.
     *
     * @param CreateDmNgheNghiepRequest $request
     *
     * @return Response
     */
    public function store(CreateDmNgheNghiepRequest $request)
    {
        $input = $request->all();

        $dmNgheNghiep = $this->dmNgheNghiepRepository->create($input);

        Flash::success('Dm Nghe Nghiep saved successfully.');

        return redirect(route('danhMuc.ngheNghiep.index'));
    }

    /**
     * Display the specified DmNgheNghiep.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmNgheNghiep = $this->dmNgheNghiepRepository->find($id);

        if (empty($dmNgheNghiep)) {
            Flash::error('Dm Nghe Nghiep not found');

            return redirect(route('danhMuc.ngheNghiep.index'));
        }

        return view('danhMuc.nghe_nghiep.show')->with('dmNgheNghiep', $dmNgheNghiep);
    }

    /**
     * Show the form for editing the specified DmNgheNghiep.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmNgheNghiep = $this->dmNgheNghiepRepository->find($id);

        if (empty($dmNgheNghiep)) {
            Flash::error('Dm Nghe Nghiep not found');

            return redirect(route('danhMuc.ngheNghiep.index'));
        }

        return view('danhMuc.nghe_nghiep.edit')->with('dmNgheNghiep', $dmNgheNghiep);
    }

    /**
     * Update the specified DmNgheNghiep in storage.
     *
     * @param  int              $id
     * @param UpdateDmNgheNghiepRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmNgheNghiepRequest $request)
    {
        $dmNgheNghiep = $this->dmNgheNghiepRepository->find($id);

        if (empty($dmNgheNghiep)) {
            Flash::error('Dm Nghe Nghiep not found');

            return redirect(route('danhMuc.ngheNghiep.index'));
        }

        $dmNgheNghiep = $this->dmNgheNghiepRepository->update($request->all(), $id);

        Flash::success('Dm Nghe Nghiep updated successfully.');

        return redirect(route('danhMuc.ngheNghiep.index'));
    }

    /**
     * Remove the specified DmNgheNghiep from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmNgheNghiep = $this->dmNgheNghiepRepository->find($id);

        if (empty($dmNgheNghiep)) {
            Flash::error('Dm Nghe Nghiep not found');

            return redirect(route('danhMuc.ngheNghiep.index'));
        }

        $this->dmNgheNghiepRepository->delete($id);

        Flash::success('Dm Nghe Nghiep deleted successfully.');

        return redirect(route('danhMuc.ngheNghiep.index'));
    }
}
