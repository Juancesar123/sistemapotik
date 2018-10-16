<?php

namespace App\Http\Controllers;

use App\DataTables\satuanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesatuanRequest;
use App\Http\Requests\UpdatesatuanRequest;
use App\Repositories\satuanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class satuanController extends AppBaseController
{
    /** @var  satuanRepository */
    private $satuanRepository;

    public function __construct(satuanRepository $satuanRepo)
    {
        $this->satuanRepository = $satuanRepo;
    }

    /**
     * Display a listing of the satuan.
     *
     * @param satuanDataTable $satuanDataTable
     * @return Response
     */
    public function index(satuanDataTable $satuanDataTable)
    {
        return $satuanDataTable->render('satuans.index');
    }

    /**
     * Show the form for creating a new satuan.
     *
     * @return Response
     */
    public function create()
    {
        return view('satuans.create');
    }

    /**
     * Store a newly created satuan in storage.
     *
     * @param CreatesatuanRequest $request
     *
     * @return Response
     */
    public function store(CreatesatuanRequest $request)
    {
        $input = $request->all();

        $satuan = $this->satuanRepository->create($input);

        Flash::success('Satuan saved successfully.');

        return redirect(route('satuans.index'));
    }

    /**
     * Display the specified satuan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        return view('satuans.show')->with('satuan', $satuan);
    }

    /**
     * Show the form for editing the specified satuan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        return view('satuans.edit')->with('satuan', $satuan);
    }

    /**
     * Update the specified satuan in storage.
     *
     * @param  int              $id
     * @param UpdatesatuanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesatuanRequest $request)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        $satuan = $this->satuanRepository->update($request->all(), $id);

        Flash::success('Satuan updated successfully.');

        return redirect(route('satuans.index'));
    }

    /**
     * Remove the specified satuan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        $this->satuanRepository->delete($id);

        Flash::success('Satuan deleted successfully.');

        return redirect(route('satuans.index'));
    }
}
