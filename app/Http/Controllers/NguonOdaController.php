<?php

namespace App\Http\Controllers;

use App\DataTables\NguonOdaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNguonOdaRequest;
use App\Http\Requests\UpdateNguonOdaRequest;
use App\Repositories\NguonOdaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NguonOdaController extends AppBaseController
{
    /** @var  NguonOdaRepository */
    private $nguonOdaRepository;

    public function __construct(NguonOdaRepository $nguonOdaRepo)
    {
        $this->nguonOdaRepository = $nguonOdaRepo;
    }

    /**
     * Display a listing of the NguonOda.
     *
     * @param NguonOdaDataTable $nguonOdaDataTable
     * @return Response
     */
    public function index(NguonOdaDataTable $nguonOdaDataTable)
    {
        return $nguonOdaDataTable->render('nguon_odas.index');
    }

    /**
     * Show the form for creating a new NguonOda.
     *
     * @return Response
     */
    public function create()
    {
        return view('nguon_odas.create');
    }

    /**
     * Store a newly created NguonOda in storage.
     *
     * @param CreateNguonOdaRequest $request
     *
     * @return Response
     */
    public function store(CreateNguonOdaRequest $request)
    {
        $input = $request->all();

        $nguonOda = $this->nguonOdaRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('nguonOdas.index'));
    }

    /**
     * Display the specified NguonOda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nguonOda = $this->nguonOdaRepository->find($id);

        if (empty($nguonOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonOdas.index'));
        }

        return view('nguon_odas.show')->with('nguonOda', $nguonOda);
    }

    /**
     * Show the form for editing the specified NguonOda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nguonOda = $this->nguonOdaRepository->find($id);

        if (empty($nguonOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonOdas.index'));
        }

        return view('nguon_odas.edit')->with('nguonOda', $nguonOda);
    }

    /**
     * Update the specified NguonOda in storage.
     *
     * @param  int              $id
     * @param UpdateNguonOdaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNguonOdaRequest $request)
    {
        $nguonOda = $this->nguonOdaRepository->find($id);

        if (empty($nguonOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonOdas.index'));
        }

        $nguonOda = $this->nguonOdaRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('nguonOdas.index'));
    }

    /**
     * Remove the specified NguonOda from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nguonOda = $this->nguonOdaRepository->find($id);

        if (empty($nguonOda)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonOdas.index'));
        }

        $this->nguonOdaRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('nguonOdas.index'));
    }
}
