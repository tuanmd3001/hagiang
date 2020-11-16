<?php

namespace App\Http\Controllers\Danh_Muc;

use App\DataTables\Danh_Muc\DmLoaiHangHoaDataTable;
use App\Http\Requests\Danh_Muc;
use App\Http\Requests\Danh_Muc\CreateDmLoaiHangHoaRequest;
use App\Http\Requests\Danh_Muc\UpdateDmLoaiHangHoaRequest;
use App\Repositories\Danh_Muc\DmLoaiHangHoaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmLoaiHangHoaController extends AppBaseController
{
    /** @var  DmLoaiHangHoaRepository */
    private $dmLoaiHangHoaRepository;

    public function __construct(DmLoaiHangHoaRepository $dmLoaiHangHoaRepo)
    {
        $this->dmLoaiHangHoaRepository = $dmLoaiHangHoaRepo;
    }

    /**
     * Display a listing of the DmLoaiHangHoa.
     *
     * @param DmLoaiHangHoaDataTable $dmLoaiHangHoaDataTable
     * @return Response
     */
    public function index(DmLoaiHangHoaDataTable $dmLoaiHangHoaDataTable)
    {
        return $dmLoaiHangHoaDataTable->render('danhMuc.loai_hang_hoa.index');
    }

    /**
     * Show the form for creating a new DmLoaiHangHoa.
     *
     * @return Response
     */
    public function create()
    {
        return view('danhMuc.loai_hang_hoa.create');
    }

    /**
     * Store a newly created DmLoaiHangHoa in storage.
     *
     * @param CreateDmLoaiHangHoaRequest $request
     *
     * @return Response
     */
    public function store(CreateDmLoaiHangHoaRequest $request)
    {
        $input = $request->all();

        $dmLoaiHangHoa = $this->dmLoaiHangHoaRepository->create($input);

        Flash::success('Dm Loai Hang Hoa saved successfully.');

        return redirect(route('danhMuc.loaiHangHoa.index'));
    }

    /**
     * Display the specified DmLoaiHangHoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmLoaiHangHoa = $this->dmLoaiHangHoaRepository->find($id);

        if (empty($dmLoaiHangHoa)) {
            Flash::error('Dm Loai Hang Hoa not found');

            return redirect(route('danhMuc.loaiHangHoa.index'));
        }

        return view('danhMuc.loai_hang_hoa.show')->with('dmLoaiHangHoa', $dmLoaiHangHoa);
    }

    /**
     * Show the form for editing the specified DmLoaiHangHoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmLoaiHangHoa = $this->dmLoaiHangHoaRepository->find($id);

        if (empty($dmLoaiHangHoa)) {
            Flash::error('Dm Loai Hang Hoa not found');

            return redirect(route('danhMuc.loaiHangHoa.index'));
        }

        return view('danhMuc.loai_hang_hoa.edit')->with('dmLoaiHangHoa', $dmLoaiHangHoa);
    }

    /**
     * Update the specified DmLoaiHangHoa in storage.
     *
     * @param  int              $id
     * @param UpdateDmLoaiHangHoaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmLoaiHangHoaRequest $request)
    {
        $dmLoaiHangHoa = $this->dmLoaiHangHoaRepository->find($id);

        if (empty($dmLoaiHangHoa)) {
            Flash::error('Dm Loai Hang Hoa not found');

            return redirect(route('danhMuc.loaiHangHoa.index'));
        }

        $dmLoaiHangHoa = $this->dmLoaiHangHoaRepository->update($request->all(), $id);

        Flash::success('Dm Loai Hang Hoa updated successfully.');

        return redirect(route('danhMuc.loaiHangHoa.index'));
    }

    /**
     * Remove the specified DmLoaiHangHoa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmLoaiHangHoa = $this->dmLoaiHangHoaRepository->find($id);

        if (empty($dmLoaiHangHoa)) {
            Flash::error('Dm Loai Hang Hoa not found');

            return redirect(route('danhMuc.loaiHangHoa.index'));
        }

        $this->dmLoaiHangHoaRepository->delete($id);

        Flash::success('Dm Loai Hang Hoa deleted successfully.');

        return redirect(route('danhMuc.loaiHangHoa.index'));
    }
}
