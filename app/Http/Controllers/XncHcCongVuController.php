<?php

namespace App\Http\Controllers;

use App\DataTables\XncHcCongVuDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateXncHcCongVuRequest;
use App\Http\Requests\UpdateXncHcCongVuRequest;
use App\Models\HcCongVu;
use App\Repositories\XncHcCongVuRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class XncHcCongVuController extends AppBaseController
{
    /** @var  XncHcCongVuRepository */
    private $xncHcCongVuRepository;

    public function __construct(XncHcCongVuRepository $xncHcCongVuRepo)
    {
        $this->xncHcCongVuRepository = $xncHcCongVuRepo;
    }

    /**
     * Display a listing of the XncHcCongVu.
     *
     * @param XncHcCongVuDataTable $xncHcCongVuDataTable
     * @return Response
     */
    public function index(XncHcCongVuDataTable $xncHcCongVuDataTable)
    {
        return $xncHcCongVuDataTable->render('xnc_hc_cong_vus.index');
    }

    /**
     * Show the form for creating a new XncHcCongVu.
     *
     * @return Response
     */
    public function create()
    {
        $hcs = HcCongVu::all();
        return view('xnc_hc_cong_vus.create', compact('hcs'));
    }

    /**
     * Store a newly created XncHcCongVu in storage.
     *
     * @param CreateXncHcCongVuRequest $request
     *
     * @return Response
     */
    public function store(CreateXncHcCongVuRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_xnc']);
        $input['ngay_xnc'] =  $date->format('Y-m-d');

        $xncHcCongVu = $this->xncHcCongVuRepository->create($input);

        Flash::success('Xnc Hc Cong Vu saved successfully.');

        return redirect(route('xncHcCongVus.index'));
    }

    /**
     * Display the specified XncHcCongVu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $xncHcCongVu = $this->xncHcCongVuRepository->find($id);

        if (empty($xncHcCongVu)) {
            Flash::error('Xnc Hc Cong Vu not found');

            return redirect(route('xncHcCongVus.index'));
        }

        return view('xnc_hc_cong_vus.show')->with('xncHcCongVu', $xncHcCongVu);
    }

    /**
     * Show the form for editing the specified XncHcCongVu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $xncHcCongVu = $this->xncHcCongVuRepository->find($id);

        if (empty($xncHcCongVu)) {
            Flash::error('Xnc Hc Cong Vu not found');

            return redirect(route('xncHcCongVus.index'));
        }
        $xncHcCongVu->ngay_xnc = date_format(new \DateTime($xncHcCongVu->ngay_xnc), 'd/m/Y') ?? '';
        $hcs = HcCongVu::all();

        return view('xnc_hc_cong_vus.edit', compact('xncHcCongVu', 'hcs'));
    }

    /**
     * Update the specified XncHcCongVu in storage.
     *
     * @param  int              $id
     * @param UpdateXncHcCongVuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateXncHcCongVuRequest $request)
    {
        $xncHcCongVu = $this->xncHcCongVuRepository->find($id);

        if (empty($xncHcCongVu)) {
            Flash::error('Xnc Hc Cong Vu not found');

            return redirect(route('xncHcCongVus.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['ngay_xnc']);
        $input['ngay_xnc'] =  $date->format('Y-m-d');

        $xncHcCongVu = $this->xncHcCongVuRepository->update($input, $id);

        Flash::success('Xnc Hc Cong Vu updated successfully.');

        return redirect(route('xncHcCongVus.index'));
    }

    /**
     * Remove the specified XncHcCongVu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $xncHcCongVu = $this->xncHcCongVuRepository->find($id);

        if (empty($xncHcCongVu)) {
            Flash::error('Xnc Hc Cong Vu not found');

            return redirect(route('xncHcCongVus.index'));
        }

        $this->xncHcCongVuRepository->delete($id);

        Flash::success('Xnc Hc Cong Vu deleted successfully.');

        return redirect(route('xncHcCongVus.index'));
    }
}
