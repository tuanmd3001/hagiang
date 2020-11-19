<?php

namespace App\Http\Controllers;

use App\DataTables\DuAnKhacDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDuAnKhacRequest;
use App\Http\Requests\UpdateDuAnKhacRequest;
use App\Repositories\DuAnKhacRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DuAnKhacController extends AppBaseController
{
    /** @var  DuAnKhacRepository */
    private $duAnKhacRepository;

    public function __construct(DuAnKhacRepository $duAnKhacRepo)
    {
        $this->duAnKhacRepository = $duAnKhacRepo;
    }

    /**
     * Display a listing of the DuAnKhac.
     *
     * @param DuAnKhacDataTable $duAnKhacDataTable
     * @return Response
     */
    public function index(DuAnKhacDataTable $duAnKhacDataTable)
    {
        return $duAnKhacDataTable->render('du_an_khacs.index');
    }

    /**
     * Show the form for creating a new DuAnKhac.
     *
     * @return Response
     */
    public function create()
    {
        return view('du_an_khacs.create');
    }

    /**
     * Store a newly created DuAnKhac in storage.
     *
     * @param CreateDuAnKhacRequest $request
     *
     * @return Response
     */
    public function store(CreateDuAnKhacRequest $request)
    {
        $input = $request->all();

        $duAnKhac = $this->duAnKhacRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('duAnKhacs.index'));
    }

    /**
     * Display the specified DuAnKhac.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $duAnKhac = $this->duAnKhacRepository->find($id);

        if (empty($duAnKhac)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnKhacs.index'));
        }

        return view('du_an_khacs.show')->with('duAnKhac', $duAnKhac);
    }

    /**
     * Show the form for editing the specified DuAnKhac.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $duAnKhac = $this->duAnKhacRepository->find($id);

        if (empty($duAnKhac)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnKhacs.index'));
        }

        return view('du_an_khacs.edit')->with('duAnKhac', $duAnKhac);
    }

    /**
     * Update the specified DuAnKhac in storage.
     *
     * @param  int              $id
     * @param UpdateDuAnKhacRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDuAnKhacRequest $request)
    {
        $duAnKhac = $this->duAnKhacRepository->find($id);

        if (empty($duAnKhac)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnKhacs.index'));
        }

        $duAnKhac = $this->duAnKhacRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('duAnKhacs.index'));
    }

    /**
     * Remove the specified DuAnKhac from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $duAnKhac = $this->duAnKhacRepository->find($id);

        if (empty($duAnKhac)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnKhacs.index'));
        }

        $this->duAnKhacRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('duAnKhacs.index'));
    }
}
