<?php

namespace App\Http\Controllers;

use App\DataTables\NguonFdiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNguonFdiRequest;
use App\Http\Requests\UpdateNguonFdiRequest;
use App\Repositories\NguonFdiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NguonFdiController extends AppBaseController
{
    /** @var  NguonFdiRepository */
    private $nguonFdiRepository;

    public function __construct(NguonFdiRepository $nguonFdiRepo)
    {
        $this->nguonFdiRepository = $nguonFdiRepo;
    }

    /**
     * Display a listing of the NguonFdi.
     *
     * @param NguonFdiDataTable $nguonFdiDataTable
     * @return Response
     */
    public function index(NguonFdiDataTable $nguonFdiDataTable)
    {
        return $nguonFdiDataTable->render('nguon_fdis.index');
    }

    /**
     * Show the form for creating a new NguonFdi.
     *
     * @return Response
     */
    public function create()
    {
        return view('nguon_fdis.create');
    }

    /**
     * Store a newly created NguonFdi in storage.
     *
     * @param CreateNguonFdiRequest $request
     *
     * @return Response
     */
    public function store(CreateNguonFdiRequest $request)
    {
        $input = $request->all();

        $nguonFdi = $this->nguonFdiRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('nguonFdis.index'));
    }

    /**
     * Display the specified NguonFdi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nguonFdi = $this->nguonFdiRepository->find($id);

        if (empty($nguonFdi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonFdis.index'));
        }

        return view('nguon_fdis.show')->with('nguonFdi', $nguonFdi);
    }

    /**
     * Show the form for editing the specified NguonFdi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nguonFdi = $this->nguonFdiRepository->find($id);

        if (empty($nguonFdi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonFdis.index'));
        }

        return view('nguon_fdis.edit')->with('nguonFdi', $nguonFdi);
    }

    /**
     * Update the specified NguonFdi in storage.
     *
     * @param  int              $id
     * @param UpdateNguonFdiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNguonFdiRequest $request)
    {
        $nguonFdi = $this->nguonFdiRepository->find($id);

        if (empty($nguonFdi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonFdis.index'));
        }

        $nguonFdi = $this->nguonFdiRepository->update($request->all(), $id);

        Flash::success('Cập nhật thông tin thành công');

        return redirect(route('nguonFdis.index'));
    }

    /**
     * Remove the specified NguonFdi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nguonFdi = $this->nguonFdiRepository->find($id);

        if (empty($nguonFdi)) {
            Flash::error('Không tìm thấy thông tin');

            return redirect(route('nguonFdis.index'));
        }

        $this->nguonFdiRepository->delete($id);

        Flash::success('Xóa thành công');

        return redirect(route('nguonFdis.index'));
    }
}
