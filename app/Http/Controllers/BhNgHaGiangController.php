<?php

namespace App\Http\Controllers;

use App\DataTables\BhNgHaGiangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBhNgHaGiangRequest;
use App\Http\Requests\UpdateBhNgHaGiangRequest;
use App\Repositories\BhNgHaGiangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BhNgHaGiangController extends AppBaseController
{
    /** @var  BhNgHaGiangRepository */
    private $bhNgHaGiangRepository;

    public function __construct(BhNgHaGiangRepository $bhNgHaGiangRepo)
    {
        $this->bhNgHaGiangRepository = $bhNgHaGiangRepo;
    }

    /**
     * Display a listing of the BhNgHaGiang.
     *
     * @param BhNgHaGiangDataTable $bhNgHaGiangDataTable
     * @return Response
     */
    public function index(BhNgHaGiangDataTable $bhNgHaGiangDataTable)
    {
        return $bhNgHaGiangDataTable->render('bh_ng_ha_giangs.index');
    }

    /**
     * Show the form for creating a new BhNgHaGiang.
     *
     * @return Response
     */
    public function create()
    {
        return view('bh_ng_ha_giangs.create');
    }

    /**
     * Store a newly created BhNgHaGiang in storage.
     *
     * @param CreateBhNgHaGiangRequest $request
     *
     * @return Response
     */
    public function store(CreateBhNgHaGiangRequest $request)
    {
        $input = $request->all();
        $thoi_han = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $thoi_han->format('Y-m-d');
        $bhNgHaGiang = $this->bhNgHaGiangRepository->create($input);

        Flash::success('Bh Ng Ha Giang saved successfully.');

        return redirect(route('bhNgHaGiangs.index'));
    }

    /**
     * Display the specified BhNgHaGiang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bhNgHaGiang = $this->bhNgHaGiangRepository->find($id);

        if (empty($bhNgHaGiang)) {
            Flash::error('Bh Ng Ha Giang not found');

            return redirect(route('bhNgHaGiangs.index'));
        }

        return view('bh_ng_ha_giangs.show')->with('bhNgHaGiang', $bhNgHaGiang);
    }

    /**
     * Show the form for editing the specified BhNgHaGiang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bhNgHaGiang = $this->bhNgHaGiangRepository->find($id);

        if (empty($bhNgHaGiang)) {
            Flash::error('Bh Ng Ha Giang not found');

            return redirect(route('bhNgHaGiangs.index'));
        }
        $bhNgHaGiang->thoi_han = date_format(new \DateTime($bhNgHaGiang->thoi_han), 'd/m/Y') ?? '';

        return view('bh_ng_ha_giangs.edit')->with('bhNgHaGiang', $bhNgHaGiang);
    }

    /**
     * Update the specified BhNgHaGiang in storage.
     *
     * @param  int              $id
     * @param UpdateBhNgHaGiangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBhNgHaGiangRequest $request)
    {
        $bhNgHaGiang = $this->bhNgHaGiangRepository->find($id);

        if (empty($bhNgHaGiang)) {
            Flash::error('Bh Ng Ha Giang not found');

            return redirect(route('bhNgHaGiangs.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $bhNgHaGiang = $this->bhNgHaGiangRepository->update($input, $id);

        Flash::success('Bh Ng Ha Giang updated successfully.');

        return redirect(route('bhNgHaGiangs.index'));
    }

    /**
     * Remove the specified BhNgHaGiang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bhNgHaGiang = $this->bhNgHaGiangRepository->find($id);

        if (empty($bhNgHaGiang)) {
            Flash::error('Bh Ng Ha Giang not found');

            return redirect(route('bhNgHaGiangs.index'));
        }

        $this->bhNgHaGiangRepository->delete($id);

        Flash::success('Bh Ng Ha Giang deleted successfully.');

        return redirect(route('bhNgHaGiangs.index'));
    }
}
