<?php

namespace App\Http\Controllers;

use App\DataTables\DuAnOdaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDuAnOdaRequest;
use App\Http\Requests\UpdateDuAnOdaRequest;
use App\Repositories\DuAnOdaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DuAnOdaController extends AppBaseController
{
    /** @var  DuAnOdaRepository */
    private $duAnOdaRepository;

    public function __construct(DuAnOdaRepository $duAnOdaRepo)
    {
        $this->duAnOdaRepository = $duAnOdaRepo;
    }

    /**
     * Display a listing of the DuAnOda.
     *
     * @param DuAnOdaDataTable $duAnOdaDataTable
     * @return Response
     */
    public function index(DuAnOdaDataTable $duAnOdaDataTable)
    {
        return $duAnOdaDataTable->render('du_an_odas.index');
    }

    /**
     * Show the form for creating a new DuAnOda.
     *
     * @return Response
     */
    public function create()
    {
        return view('du_an_odas.create');
    }

    /**
     * Store a newly created DuAnOda in storage.
     *
     * @param CreateDuAnOdaRequest $request
     *
     * @return Response
     */
    public function store(CreateDuAnOdaRequest $request)
    {
        $input = $request->all();

        $duAnOda = $this->duAnOdaRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('duAnOdas.index'));
    }

    /**
     * Display the specified DuAnOda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $duAnOda = $this->duAnOdaRepository->find($id);

        if (empty($duAnOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnOdas.index'));
        }

        return view('du_an_odas.show')->with('duAnOda', $duAnOda);
    }

    /**
     * Show the form for editing the specified DuAnOda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $duAnOda = $this->duAnOdaRepository->find($id);

        if (empty($duAnOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnOdas.index'));
        }

        return view('du_an_odas.edit')->with('duAnOda', $duAnOda);
    }

    /**
     * Update the specified DuAnOda in storage.
     *
     * @param  int              $id
     * @param UpdateDuAnOdaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDuAnOdaRequest $request)
    {
        $duAnOda = $this->duAnOdaRepository->find($id);

        if (empty($duAnOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnOdas.index'));
        }

        $duAnOda = $this->duAnOdaRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('duAnOdas.index'));
    }

    /**
     * Remove the specified DuAnOda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $duAnOda = $this->duAnOdaRepository->find($id);

        if (empty($duAnOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('duAnOdas.index'));
        }

        $this->duAnOdaRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('duAnOdas.index'));
    }
}
