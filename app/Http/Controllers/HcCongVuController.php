<?php

namespace App\Http\Controllers;

use App\DataTables\HcCongVuDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHcCongVuRequest;
use App\Http\Requests\UpdateHcCongVuRequest;
use App\Repositories\HcCongVuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HcCongVuController extends AppBaseController
{
    /** @var  HcCongVuRepository */
    private $hcCongVuRepository;

    public function __construct(HcCongVuRepository $hcCongVuRepo)
    {
        $this->hcCongVuRepository = $hcCongVuRepo;
    }

    /**
     * Display a listing of the HcCongVu.
     *
     * @param HcCongVuDataTable $hcCongVuDataTable
     * @return Response
     */
    public function index(HcCongVuDataTable $hcCongVuDataTable)
    {
        return $hcCongVuDataTable->render('hc_cong_vus.index');
    }

    /**
     * Show the form for creating a new HcCongVu.
     *
     * @return Response
     */
    public function create()
    {
        return view('hc_cong_vus.create');
    }

    /**
     * Store a newly created HcCongVu in storage.
     *
     * @param CreateHcCongVuRequest $request
     *
     * @return Response
     */
    public function store(CreateHcCongVuRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $hcCongVu = $this->hcCongVuRepository->create($input);

        Flash::success('Hc Cong Vu saved successfully.');

        return redirect(route('hcCongVus.index'));
    }

    /**
     * Display the specified HcCongVu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hcCongVu = $this->hcCongVuRepository->find($id);

        if (empty($hcCongVu)) {
            Flash::error('Hc Cong Vu not found');

            return redirect(route('hcCongVus.index'));
        }

        return view('hc_cong_vus.show')->with('hcCongVu', $hcCongVu);
    }

    /**
     * Show the form for editing the specified HcCongVu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hcCongVu = $this->hcCongVuRepository->find($id);

        if (empty($hcCongVu)) {
            Flash::error('Hc Cong Vu not found');

            return redirect(route('hcCongVus.index'));
        }
        $hcCongVu->thoi_han = date_format(new \DateTime($hcCongVu->thoi_han), 'd/m/Y') ?? '';

        return view('hc_cong_vus.edit')->with('hcCongVu', $hcCongVu);
    }

    /**
     * Update the specified HcCongVu in storage.
     *
     * @param  int              $id
     * @param UpdateHcCongVuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHcCongVuRequest $request)
    {
        $hcCongVu = $this->hcCongVuRepository->find($id);

        if (empty($hcCongVu)) {
            Flash::error('Hc Cong Vu not found');

            return redirect(route('hcCongVus.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $hcCongVu = $this->hcCongVuRepository->update($input, $id);

        Flash::success('Hc Cong Vu updated successfully.');

        return redirect(route('hcCongVus.index'));
    }

    /**
     * Remove the specified HcCongVu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hcCongVu = $this->hcCongVuRepository->find($id);

        if (empty($hcCongVu)) {
            Flash::error('Hc Cong Vu not found');

            return redirect(route('hcCongVus.index'));
        }

        $this->hcCongVuRepository->delete($id);

        Flash::success('Hc Cong Vu deleted successfully.');

        return redirect(route('hcCongVus.index'));
    }
}
