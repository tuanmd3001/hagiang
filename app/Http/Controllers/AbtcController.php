<?php

namespace App\Http\Controllers;

use App\DataTables\AbtcDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAbtcRequest;
use App\Http\Requests\UpdateAbtcRequest;
use App\Repositories\AbtcRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AbtcController extends AppBaseController
{
    /** @var  AbtcRepository */
    private $abtcRepository;

    public function __construct(AbtcRepository $abtcRepo)
    {
        $this->abtcRepository = $abtcRepo;
    }

    /**
     * Display a listing of the Abtc.
     *
     * @param AbtcDataTable $abtcDataTable
     * @return Response
     */
    public function index(AbtcDataTable $abtcDataTable)
    {
        return $abtcDataTable->render('abtcs.index');
    }

    /**
     * Show the form for creating a new Abtc.
     *
     * @return Response
     */
    public function create()
    {
        return view('abtcs.create');
    }

    /**
     * Store a newly created Abtc in storage.
     *
     * @param CreateAbtcRequest $request
     *
     * @return Response
     */
    public function store(CreateAbtcRequest $request)
    {
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $abtc = $this->abtcRepository->create($input);

        Flash::success('Abtc saved successfully.');

        return redirect(route('abtcs.index'));
    }

    /**
     * Display the specified Abtc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $abtc = $this->abtcRepository->find($id);

        if (empty($abtc)) {
            Flash::error('Abtc not found');

            return redirect(route('abtcs.index'));
        }

        return view('abtcs.show')->with('abtc', $abtc);
    }

    /**
     * Show the form for editing the specified Abtc.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $abtc = $this->abtcRepository->find($id);

        if (empty($abtc)) {
            Flash::error('Abtc not found');

            return redirect(route('abtcs.index'));
        }
        $abtc->thoi_han = date_format(new \DateTime($abtc->thoi_han), 'd/m/Y') ?? '';

        return view('abtcs.edit')->with('abtc', $abtc);
    }

    /**
     * Update the specified Abtc in storage.
     *
     * @param  int              $id
     * @param UpdateAbtcRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAbtcRequest $request)
    {
        $abtc = $this->abtcRepository->find($id);

        if (empty($abtc)) {
            Flash::error('Abtc not found');

            return redirect(route('abtcs.index'));
        }
        $input = $request->all();
        $date = \DateTime::createFromFormat('d/m/Y', $input['thoi_han']);
        $input['thoi_han'] =  $date->format('Y-m-d');

        $abtc = $this->abtcRepository->update($input, $id);

        Flash::success('Abtc updated successfully.');

        return redirect(route('abtcs.index'));
    }

    /**
     * Remove the specified Abtc from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $abtc = $this->abtcRepository->find($id);

        if (empty($abtc)) {
            Flash::error('Abtc not found');

            return redirect(route('abtcs.index'));
        }

        $this->abtcRepository->delete($id);

        Flash::success('Abtc deleted successfully.');

        return redirect(route('abtcs.index'));
    }
}
