<?php

namespace App\Http\Controllers;

use App\DataTables\KyKetHuuNghiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKyKetHuuNghiRequest;
use App\Http\Requests\UpdateKyKetHuuNghiRequest;
use App\Repositories\KyKetHuuNghiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KyKetHuuNghiController extends AppBaseController
{
    /** @var  KyKetHuuNghiRepository */
    private $kyKetHuuNghiRepository;

    public function __construct(KyKetHuuNghiRepository $kyKetHuuNghiRepo)
    {
        $this->kyKetHuuNghiRepository = $kyKetHuuNghiRepo;
    }

    /**
     * Display a listing of the KyKetHuuNghi.
     *
     * @param KyKetHuuNghiDataTable $kyKetHuuNghiDataTable
     * @return Response
     */
    public function index(KyKetHuuNghiDataTable $kyKetHuuNghiDataTable)
    {
        return $kyKetHuuNghiDataTable->render('ky_ket_huu_nghis.index');
    }

    /**
     * Show the form for creating a new KyKetHuuNghi.
     *
     * @return Response
     */
    public function create()
    {
        return view('ky_ket_huu_nghis.create');
    }

    /**
     * Store a newly created KyKetHuuNghi in storage.
     *
     * @param CreateKyKetHuuNghiRequest $request
     *
     * @return Response
     */
    public function store(CreateKyKetHuuNghiRequest $request)
    {
        $input = $request->all();

        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_ky']);
        $input['ngay_ky'] =  $date->format('Y-m-d');

        $kyKetHuuNghi = $this->kyKetHuuNghiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('kyKetHuuNghis.index'));
    }

    /**
     * Display the specified KyKetHuuNghi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kyKetHuuNghi = $this->kyKetHuuNghiRepository->find($id);

        if (empty($kyKetHuuNghi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('kyKetHuuNghis.index'));
        }

        return view('ky_ket_huu_nghis.show')->with('kyKetHuuNghi', $kyKetHuuNghi);
    }

    /**
     * Show the form for editing the specified KyKetHuuNghi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kyKetHuuNghi = $this->kyKetHuuNghiRepository->find($id);

        if (empty($kyKetHuuNghi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('kyKetHuuNghis.index'));
        }
        $kyKetHuuNghi->ngay_ky = date_format(new \DateTime($kyKetHuuNghi->ngay_ky), 'd/m/Y') ?? '';

        return view('ky_ket_huu_nghis.edit')->with('kyKetHuuNghi', $kyKetHuuNghi);
    }

    /**
     * Update the specified KyKetHuuNghi in storage.
     *
     * @param  int              $id
     * @param UpdateKyKetHuuNghiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKyKetHuuNghiRequest $request)
    {
        $kyKetHuuNghi = $this->kyKetHuuNghiRepository->find($id);

        if (empty($kyKetHuuNghi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('kyKetHuuNghis.index'));
        }

        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_ky']);
        $input['ngay_ky'] =  $date->format('Y-m-d');

        $kyKetHuuNghi = $this->kyKetHuuNghiRepository->update($input, $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('kyKetHuuNghis.index'));
    }

    /**
     * Remove the specified KyKetHuuNghi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kyKetHuuNghi = $this->kyKetHuuNghiRepository->find($id);

        if (empty($kyKetHuuNghi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('kyKetHuuNghis.index'));
        }

        $this->kyKetHuuNghiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('kyKetHuuNghis.index'));
    }
}
