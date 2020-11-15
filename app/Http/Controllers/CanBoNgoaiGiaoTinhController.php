<?php

namespace App\Http\Controllers;

use App\DataTables\CanBoNgoaiGiaoTinhDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCanBoNgoaiGiaoTinhRequest;
use App\Http\Requests\UpdateCanBoNgoaiGiaoTinhRequest;
use App\Repositories\CanBoNgoaiGiaoTinhRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CanBoNgoaiGiaoTinhController extends AppBaseController
{
    /** @var  CanBoNgoaiGiaoTinhRepository */
    private $canBoNgoaiGiaoTinhRepository;

    public function __construct(CanBoNgoaiGiaoTinhRepository $canBoNgoaiGiaoTinhRepo)
    {
        $this->canBoNgoaiGiaoTinhRepository = $canBoNgoaiGiaoTinhRepo;
    }

    /**
     * Display a listing of the CanBoNgoaiGiaoTinh.
     *
     * @param CanBoNgoaiGiaoTinhDataTable $canBoNgoaiGiaoTinhDataTable
     * @return Response
     */
    public function index(CanBoNgoaiGiaoTinhDataTable $canBoNgoaiGiaoTinhDataTable)
    {
        return $canBoNgoaiGiaoTinhDataTable->render('can_bo_ngoai_giao_tinhs.index');
    }

    /**
     * Show the form for creating a new CanBoNgoaiGiaoTinh.
     *
     * @return Response
     */
    public function create()
    {
        return view('can_bo_ngoai_giao_tinhs.create');
    }

    /**
     * Store a newly created CanBoNgoaiGiaoTinh in storage.
     *
     * @param CreateCanBoNgoaiGiaoTinhRequest $request
     *
     * @return Response
     */
    public function store(CreateCanBoNgoaiGiaoTinhRequest $request)
    {
        $input = $request->all();

        $canBoNgoaiGiaoTinh = $this->canBoNgoaiGiaoTinhRepository->create($input);

        Flash::success('Can Bo Ngoai Giao Tinh saved successfully.');

        return redirect(route('canBoNgoaiGiaoTinhs.index'));
    }

    /**
     * Display the specified CanBoNgoaiGiaoTinh.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $canBoNgoaiGiaoTinh = $this->canBoNgoaiGiaoTinhRepository->find($id);

        if (empty($canBoNgoaiGiaoTinh)) {
            Flash::error('Can Bo Ngoai Giao Tinh not found');

            return redirect(route('canBoNgoaiGiaoTinhs.index'));
        }

        return view('can_bo_ngoai_giao_tinhs.show')->with('canBoNgoaiGiaoTinh', $canBoNgoaiGiaoTinh);
    }

    /**
     * Show the form for editing the specified CanBoNgoaiGiaoTinh.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $canBoNgoaiGiaoTinh = $this->canBoNgoaiGiaoTinhRepository->find($id);

        if (empty($canBoNgoaiGiaoTinh)) {
            Flash::error('Can Bo Ngoai Giao Tinh not found');

            return redirect(route('canBoNgoaiGiaoTinhs.index'));
        }

        return view('can_bo_ngoai_giao_tinhs.edit')->with('canBoNgoaiGiaoTinh', $canBoNgoaiGiaoTinh);
    }

    /**
     * Update the specified CanBoNgoaiGiaoTinh in storage.
     *
     * @param  int              $id
     * @param UpdateCanBoNgoaiGiaoTinhRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCanBoNgoaiGiaoTinhRequest $request)
    {
        $canBoNgoaiGiaoTinh = $this->canBoNgoaiGiaoTinhRepository->find($id);

        if (empty($canBoNgoaiGiaoTinh)) {
            Flash::error('Can Bo Ngoai Giao Tinh not found');

            return redirect(route('canBoNgoaiGiaoTinhs.index'));
        }

        $canBoNgoaiGiaoTinh = $this->canBoNgoaiGiaoTinhRepository->update($request->all(), $id);

        Flash::success('Can Bo Ngoai Giao Tinh updated successfully.');

        return redirect(route('canBoNgoaiGiaoTinhs.index'));
    }

    /**
     * Remove the specified CanBoNgoaiGiaoTinh from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $canBoNgoaiGiaoTinh = $this->canBoNgoaiGiaoTinhRepository->find($id);

        if (empty($canBoNgoaiGiaoTinh)) {
            Flash::error('Can Bo Ngoai Giao Tinh not found');

            return redirect(route('canBoNgoaiGiaoTinhs.index'));
        }

        $this->canBoNgoaiGiaoTinhRepository->delete($id);

        Flash::success('Can Bo Ngoai Giao Tinh deleted successfully.');

        return redirect(route('canBoNgoaiGiaoTinhs.index'));
    }
}
