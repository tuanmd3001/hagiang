<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmToChucDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmToChucRequest;
use App\Http\Requests\Danh_Muc\UpdateDmToChucRequest;
use App\Repositories\Danh_Muc\DmToChucRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmToChucController extends AppBaseController
{
    /** @var  DmToChucRepository */
    private $dmToChucRepository;

    public function __construct(DmToChucRepository $dmToChucRepo)
    {
        $this->dmToChucRepository = $dmToChucRepo;
    }

    /**
     * Display a listing of the DmToChuc.
     *
     * @param DmToChucDataTable $dmToChucDataTable
     * @return Response
     */
    public function index(DmToChucDataTable $dmToChucDataTable)
    {
        return $dmToChucDataTable->render('danhMuc.to_chuc.index');
    }

    /**
     * Show the form for creating a new DmToChuc.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.to_chuc.create');
    }

    /**
     * Store a newly created DmToChuc in storage.
     *
     * @param CreateDmToChucRequest $request
     *
     * @return Response
     */
    public function store(CreateDmToChucRequest $request)
    {
        $input = $request->all();

        $dmToChuc = $this->dmToChucRepository->create($input);

        Flash::success('Dm To Chuc saved successfully.');

        return redirect(route('danhMuc.toChuc.index'));
    }

    /**
     * Display the specified DmToChuc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmToChuc = $this->dmToChucRepository->find($id);

        if (empty($dmToChuc)) {
            Flash::error('Dm To Chuc not found');

            return redirect(route('danhMuc.toChuc.index'));
        }

        return view('danhMuc.to_chuc.show')->with('dmToChuc', $dmToChuc);
    }

    /**
     * Show the form for editing the specified DmToChuc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmToChuc = $this->dmToChucRepository->find($id);

        if (empty($dmToChuc)) {
            Flash::error('Dm To Chuc not found');

            return redirect(route('danhMuc.toChuc.index'));
        }

        return view('danhMuc.to_chuc.edit')->with('dmToChuc', $dmToChuc);
    }

    /**
     * Update the specified DmToChuc in storage.
     *
     * @param  int              $id
     * @param UpdateDmToChucRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmToChucRequest $request)
    {
        $dmToChuc = $this->dmToChucRepository->find($id);

        if (empty($dmToChuc)) {
            Flash::error('Dm To Chuc not found');

            return redirect(route('danhMuc.toChuc.index'));
        }

        $dmToChuc = $this->dmToChucRepository->update($request->all(), $id);

        Flash::success('Dm To Chuc updated successfully.');

        return redirect(route('danhMuc.toChuc.index'));
    }

    /**
     * Remove the specified DmToChuc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmToChuc = $this->dmToChucRepository->find($id);

        if (empty($dmToChuc)) {
            Flash::error('Dm To Chuc not found');

            return redirect(route('danhMuc.toChuc.index'));
        }

        $this->dmToChucRepository->delete($id);

        Flash::success('Dm To Chuc deleted successfully.');

        return redirect(route('danhMuc.toChuc.index'));
    }
}
