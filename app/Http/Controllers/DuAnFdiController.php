<?php

namespace App\Http\Controllers;

use App\DataTables\DuAnFdiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDuAnFdiRequest;
use App\Http\Requests\UpdateDuAnFdiRequest;
use App\Repositories\DuAnFdiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DuAnFdiController extends AppBaseController
{
    /** @var  DuAnFdiRepository */
    private $duAnFdiRepository;

    public function __construct(DuAnFdiRepository $duAnFdiRepo)
    {
        $this->duAnFdiRepository = $duAnFdiRepo;
    }

    /**
     * Display a listing of the DuAnFdi.
     *
     * @param DuAnFdiDataTable $duAnFdiDataTable
     * @return Response
     */
    public function index(DuAnFdiDataTable $duAnFdiDataTable)
    {
        return $duAnFdiDataTable->render('du_an_fdis.index');
    }

    /**
     * Show the form for creating a new DuAnFdi.
     *
     * @return Response
     */
    public function create()
    {
        return view('du_an_fdis.create');
    }

    /**
     * Store a newly created DuAnFdi in storage.
     *
     * @param CreateDuAnFdiRequest $request
     *
     * @return Response
     */
    public function store(CreateDuAnFdiRequest $request)
    {
        $input = $request->all();

        $duAnFdi = $this->duAnFdiRepository->create($input);

        Flash::success('Du An Fdi saved successfully.');

        return redirect(route('duAnFdis.index'));
    }

    /**
     * Display the specified DuAnFdi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $duAnFdi = $this->duAnFdiRepository->find($id);

        if (empty($duAnFdi)) {
            Flash::error('Du An Fdi not found');

            return redirect(route('duAnFdis.index'));
        }

        return view('du_an_fdis.show')->with('duAnFdi', $duAnFdi);
    }

    /**
     * Show the form for editing the specified DuAnFdi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $duAnFdi = $this->duAnFdiRepository->find($id);

        if (empty($duAnFdi)) {
            Flash::error('Du An Fdi not found');

            return redirect(route('duAnFdis.index'));
        }

        return view('du_an_fdis.edit')->with('duAnFdi', $duAnFdi);
    }

    /**
     * Update the specified DuAnFdi in storage.
     *
     * @param  int              $id
     * @param UpdateDuAnFdiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDuAnFdiRequest $request)
    {
        $duAnFdi = $this->duAnFdiRepository->find($id);

        if (empty($duAnFdi)) {
            Flash::error('Du An Fdi not found');

            return redirect(route('duAnFdis.index'));
        }

        $duAnFdi = $this->duAnFdiRepository->update($request->all(), $id);

        Flash::success('Du An Fdi updated successfully.');

        return redirect(route('duAnFdis.index'));
    }

    /**
     * Remove the specified DuAnFdi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $duAnFdi = $this->duAnFdiRepository->find($id);

        if (empty($duAnFdi)) {
            Flash::error('Du An Fdi not found');

            return redirect(route('duAnFdis.index'));
        }

        $this->duAnFdiRepository->delete($id);

        Flash::success('Du An Fdi deleted successfully.');

        return redirect(route('duAnFdis.index'));
    }
}
