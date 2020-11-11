<?php

namespace App\Http\Controllers;

use App\DataTables\HoiNghiHoiThaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHoiNghiHoiThaoRequest;
use App\Http\Requests\UpdateHoiNghiHoiThaoRequest;
use App\Models\HoiNghiHoiThao;
use App\Repositories\HoiNghiHoiThaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HoiNghiHoiThaoController extends AppBaseController
{
    /** @var  HoiNghiHoiThaoRepository */
    private $hoiNghiHoiThaoRepository;

    public function __construct(HoiNghiHoiThaoRepository $hoiNghiHoiThaoRepo)
    {
        $this->hoiNghiHoiThaoRepository = $hoiNghiHoiThaoRepo;
    }

    /**
     * Display a listing of the HoiNghiHoiThao.
     *
     * @param HoiNghiHoiThaoDataTable $hoiNghiHoiThaoDataTable
     * @return Response
     */
    public function index(HoiNghiHoiThaoDataTable $hoiNghiHoiThaoDataTable)
    {
        $type = HoiNghiHoiThao::TYPE_HOST;
        if(request()->has('type') && request()->get('type') == HoiNghiHoiThao::TYPE_JOIN){
            $type = HoiNghiHoiThao::TYPE_JOIN;
        }
        $datatable = new HoiNghiHoiThaoDataTable($type);
        return $datatable->render('hoi_nghi_hoi_thao.index', compact("type"));
    }

    /**
     * Show the form for creating a new HoiNghiHoiThao.
     *
     * @return Response
     */
    public function create()
    {
        $nguon_kinh_phi = [
            ["id" => 1, "name" => "NS tỉnh"],
            ["id" => 2, "name" => "NS ngành"],
            ["id" => 3, "name" => "Đài thọ"],
        ];
        return view('hoi_nghi_hoi_thao.create', compact("nguon_kinh_phi"));
    }

    /**
     * Store a newly created HoiNghiHoiThao in storage.
     *
     * @param CreateHoiNghiHoiThaoRequest $request
     *
     * @return Response
     */
    public function store(CreateHoiNghiHoiThaoRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y H:i:s', $input['thoi_gian'].' 00:00:00');
        $input['thoi_gian'] =  $date->format('Y-m-d H:i:s');
        if (isset($input['trong_kh'])) {
            $input['trong_kh'] = 1;
        }
        else {
            $input['trong_kh'] = 0;
        }

        $hoiNghiHoiThao = $this->hoiNghiHoiThaoRepository->create($input);

        Flash::success('Hoi Nghi Hoi Thao saved successfully.');

        return redirect(route('hoiNghiHoiThao.index', ['type' => $input['loai']]));
    }

    /**
     * Display the specified HoiNghiHoiThao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hoiNghiHoiThao = $this->hoiNghiHoiThaoRepository->find($id);

        if (empty($hoiNghiHoiThao)) {
            Flash::error('Hoi Nghi Hoi Thao not found');

            return redirect(route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]));
        }
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $hoiNghiHoiThao->thoi_gian.' 00:00:00');
        $hoiNghiHoiThao->thoi_gian =  $date->format('d/m/Y');

        return view('hoi_nghi_hoi_thao.show')->with('hoiNghiHoiThao', $hoiNghiHoiThao);
    }

    /**
     * Show the form for editing the specified HoiNghiHoiThao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hoiNghiHoiThao = $this->hoiNghiHoiThaoRepository->find($id);

        if (empty($hoiNghiHoiThao)) {
            Flash::error('Hoi Nghi Hoi Thao not found');

            return redirect(route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]));
        }

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $hoiNghiHoiThao->thoi_gian.' 00:00:00');
        $hoiNghiHoiThao->thoi_gian =  $date->format('d/m/Y');

        $nguon_kinh_phi = [
            ["id" => 1, "name" => "NS tỉnh"],
            ["id" => 2, "name" => "NS ngành"],
            ["id" => 3, "name" => "Đài thọ"],
        ];

        return view('hoi_nghi_hoi_thao.edit', compact("hoiNghiHoiThao", "nguon_kinh_phi"));
    }

    /**
     * Update the specified HoiNghiHoiThao in storage.
     *
     * @param  int              $id
     * @param UpdateHoiNghiHoiThaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHoiNghiHoiThaoRequest $request)
    {
        $hoiNghiHoiThao = $this->hoiNghiHoiThaoRepository->find($id);

        if (empty($hoiNghiHoiThao)) {
            Flash::error('Hoi Nghi Hoi Thao not found');

            return redirect(route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y H:i:s', $input['thoi_gian'].' 00:00:00');
        $input['thoi_gian'] =  $date->format('Y-m-d H:i:s');
        if (isset($input['trong_kh'])) {
            $input['trong_kh'] = 1;
        }
        else {
            $input['trong_kh'] = 0;
        }
        $hoiNghiHoiThao = $this->hoiNghiHoiThaoRepository->update($input, $id);

        Flash::success('Hoi Nghi Hoi Thao updated successfully.');

        return redirect(route('hoiNghiHoiThao.index', ['type' => $input['loai']]));
    }

    /**
     * Remove the specified HoiNghiHoiThao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hoiNghiHoiThao = $this->hoiNghiHoiThaoRepository->find($id);

        if (empty($hoiNghiHoiThao)) {
            Flash::error('Hoi Nghi Hoi Thao not found');

            return redirect(route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]));
        }

        $this->hoiNghiHoiThaoRepository->delete($id);

        Flash::success('Hoi Nghi Hoi Thao deleted successfully.');

        return redirect(route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]));
    }
}
