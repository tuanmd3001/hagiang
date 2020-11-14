<?php

namespace App\Http\Controllers;

use App\DataTables\ChuKyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateChuKyRequest;
use App\Http\Requests\UpdateChuKyRequest;
use App\Repositories\ChuKyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Ramsey\Uuid\Uuid;
use Response;

class ChuKyController extends AppBaseController
{
    /** @var  ChuKyRepository */
    private $chuKyRepository;

    public function __construct(ChuKyRepository $chuKyRepo)
    {
        $this->chuKyRepository = $chuKyRepo;
    }

    /**
     * Display a listing of the ChuKy.
     *
     * @param ChuKyDataTable $chuKyDataTable
     * @return Response
     */
    public function index(ChuKyDataTable $chuKyDataTable)
    {
        return $chuKyDataTable->render('chu_kies.index');
    }

    /**
     * Show the form for creating a new ChuKy.
     *
     * @return Response
     */
    public function create()
    {
        return view('chu_kies.create');
    }

    /**
     * Store a newly created ChuKy in storage.
     *
     * @param CreateChuKyRequest $request
     *
     * @return Response
     */
    public function store(CreateChuKyRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('file')) {
            $file_chu_ky = $request->file('file');
            $new_name = Uuid::uuid4() . '.' . $file_chu_ky->getClientOriginalExtension();
            $file_chu_ky->move(public_path('/chu_ky_con_dau/'), $new_name);
            $input['file'] = '/chu_ky_con_dau/' . $new_name;
        }

        $chuKy = $this->chuKyRepository->create($input);

        Flash::success('Chu Ky saved successfully.');

        return redirect(route('chuKies.index'));
    }

    /**
     * Display the specified ChuKy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chuKy = $this->chuKyRepository->find($id);

        if (empty($chuKy)) {
            Flash::error('Chu Ky not found');

            return redirect(route('chuKies.index'));
        }

        return view('chu_kies.show')->with('chuKy', $chuKy);
    }

    /**
     * Show the form for editing the specified ChuKy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chuKy = $this->chuKyRepository->find($id);

        if (empty($chuKy)) {
            Flash::error('Chu Ky not found');

            return redirect(route('chuKies.index'));
        }

        return view('chu_kies.edit')->with('chuKy', $chuKy);
    }

    /**
     * Update the specified ChuKy in storage.
     *
     * @param  int              $id
     * @param UpdateChuKyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChuKyRequest $request)
    {
        $chuKy = $this->chuKyRepository->find($id);

        if (empty($chuKy)) {
            Flash::error('Chu Ky not found');

            return redirect(route('chuKies.index'));
        }
        $input = $request->all();
        if ($request->hasFile('file')) {
            $file_chu_ky = $request->file('file');
            $new_name = Uuid::uuid4() . '.' . $file_chu_ky->getClientOriginalExtension();
            $file_chu_ky->move(public_path('/chu_ky_con_dau/'), $new_name);
            $input['file'] = '/chu_ky_con_dau/' . $new_name;
        }

        $chuKy = $this->chuKyRepository->update($input, $id);

        Flash::success('Chu Ky updated successfully.');

        return redirect(route('chuKies.index'));
    }

    /**
     * Remove the specified ChuKy from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chuKy = $this->chuKyRepository->find($id);

        if (empty($chuKy)) {
            Flash::error('Chu Ky not found');

            return redirect(route('chuKies.index'));
        }

        $this->chuKyRepository->delete($id);

        Flash::success('Chu Ky deleted successfully.');

        return redirect(route('chuKies.index'));
    }
}
