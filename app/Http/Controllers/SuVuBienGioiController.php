<?php

namespace App\Http\Controllers;

use App\DataTables\SuVuBienGioiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSuVuBienGioiRequest;
use App\Http\Requests\UpdateSuVuBienGioiRequest;
use App\Repositories\SuVuBienGioiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SuVuBienGioiController extends AppBaseController
{
    /** @var  SuVuBienGioiRepository */
    private $suVuBienGioiRepository;

    public function __construct(SuVuBienGioiRepository $suVuBienGioiRepo)
    {
        $this->suVuBienGioiRepository = $suVuBienGioiRepo;
    }

    /**
     * Display a listing of the SuVuBienGioi.
     *
     * @param SuVuBienGioiDataTable $suVuBienGioiDataTable
     * @return Response
     */
    public function index(SuVuBienGioiDataTable $suVuBienGioiDataTable)
    {
        return $suVuBienGioiDataTable->render('su_vu_bien_giois.index');
    }

    /**
     * Show the form for creating a new SuVuBienGioi.
     *
     * @return Response
     */
    public function create()
    {
        return view('su_vu_bien_giois.create');
    }

    /**
     * Store a newly created SuVuBienGioi in storage.
     *
     * @param CreateSuVuBienGioiRequest $request
     *
     * @return Response
     */
    public function store(CreateSuVuBienGioiRequest $request)
    {
        $input = $request->all();

        $suVuBienGioi = $this->suVuBienGioiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('suVuBienGiois.index'));
    }

    /**
     * Display the specified SuVuBienGioi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suVuBienGioi = $this->suVuBienGioiRepository->find($id);

        if (empty($suVuBienGioi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('suVuBienGiois.index'));
        }

        return view('su_vu_bien_giois.show')->with('suVuBienGioi', $suVuBienGioi);
    }

    /**
     * Show the form for editing the specified SuVuBienGioi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suVuBienGioi = $this->suVuBienGioiRepository->find($id);

        if (empty($suVuBienGioi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('suVuBienGiois.index'));
        }

        return view('su_vu_bien_giois.edit')->with('suVuBienGioi', $suVuBienGioi);
    }

    /**
     * Update the specified SuVuBienGioi in storage.
     *
     * @param  int              $id
     * @param UpdateSuVuBienGioiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSuVuBienGioiRequest $request)
    {
        $suVuBienGioi = $this->suVuBienGioiRepository->find($id);

        if (empty($suVuBienGioi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('suVuBienGiois.index'));
        }

        $suVuBienGioi = $this->suVuBienGioiRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('suVuBienGiois.index'));
    }

    /**
     * Remove the specified SuVuBienGioi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suVuBienGioi = $this->suVuBienGioiRepository->find($id);

        if (empty($suVuBienGioi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('suVuBienGiois.index'));
        }

        $this->suVuBienGioiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('suVuBienGiois.index'));
    }
}
