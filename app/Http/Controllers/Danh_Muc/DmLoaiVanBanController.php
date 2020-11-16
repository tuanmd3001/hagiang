<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiVanBanDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiVanBanRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiVanBanRequest;
use App\Repositories\Danh_Muc\DmLoaiVanBanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiVanBanController extends AppBaseController
{
    /** @var  DmLoaiVanBanRepository */
    private $dmLoaiVanBanRepository;

    public function __construct(DmLoaiVanBanRepository $dmLoaiVanBanRepo)
    {
        $this->dmLoaiVanBanRepository = $dmLoaiVanBanRepo;
    }

    /**
     * Display a listing of the DmLoaiVanBan.
     *
     * @param DmLoaiVanBanDataTable $dmLoaiVanBanDataTable
     * @return Response
     */
    public function index(DmLoaiVanBanDataTable $dmLoaiVanBanDataTable)
    {
        return $dmLoaiVanBanDataTable->render('danhMuc.loai_van_ban.index');
    }

    /**
     * Show the form for creating a new DmLoaiVanBan.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_van_ban.create');
    }

    /**
     * Store a newly created DmLoaiVanBan in storage.
     *
     * @param CreateDmLoaiVanBanRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiVanBanRequest $request)
    {
        $input = $request->all();

        $dmLoaiVanBan = $this->dmLoaiVanBanRepository->create($input);

        Flash::success('Dm Loai Van Ban saved successfully.');

        return redirect(route('danhMuc.loaiVanBan.index'));
    }

    /**
     * Display the specified DmLoaiVanBan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiVanBan = $this->dmLoaiVanBanRepository->find($id);

        if (empty($dmLoaiVanBan)) {
            Flash::error('Dm Loai Van Ban not found');

            return redirect(route('danhMuc.loaiVanBan.index'));
        }

        return view('danhMuc.loai_van_ban.show')->with('dmLoaiVanBan', $dmLoaiVanBan);
    }

    /**
     * Show the form for editing the specified DmLoaiVanBan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiVanBan = $this->dmLoaiVanBanRepository->find($id);

        if (empty($dmLoaiVanBan)) {
            Flash::error('Dm Loai Van Ban not found');

            return redirect(route('danhMuc.loaiVanBan.index'));
        }

        return view('danhMuc.loai_van_ban.edit')->with('dmLoaiVanBan', $dmLoaiVanBan);
    }

    /**
     * Update the specified DmLoaiVanBan in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiVanBanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiVanBanRequest $request)
    {
        $dmLoaiVanBan = $this->dmLoaiVanBanRepository->find($id);

        if (empty($dmLoaiVanBan)) {
            Flash::error('Dm Loai Van Ban not found');

            return redirect(route('danhMuc.loaiVanBan.index'));
        }

        $dmLoaiVanBan = $this->dmLoaiVanBanRepository->update($request->all(), $id);

        Flash::success('Dm Loai Van Ban updated successfully.');

        return redirect(route('danhMuc.loaiVanBan.index'));
    }

    /**
     * Remove the specified DmLoaiVanBan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiVanBan = $this->dmLoaiVanBanRepository->find($id);

        if (empty($dmLoaiVanBan)) {
            Flash::error('Dm Loai Van Ban not found');

            return redirect(route('danhMuc.loaiVanBan.index'));
        }

        $this->dmLoaiVanBanRepository->delete($id);

        Flash::success('Dm Loai Van Ban deleted successfully.');

        return redirect(route('danhMuc.loaiVanBan.index'));
    }
}
