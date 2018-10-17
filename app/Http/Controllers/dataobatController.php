<?php

namespace App\Http\Controllers;

use App\DataTables\dataobatDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedataobatRequest;
use App\Http\Requests\UpdatedataobatRequest;
use App\Repositories\dataobatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class dataobatController extends AppBaseController
{
    /** @var  dataobatRepository */
    private $dataobatRepository;

    public function __construct(dataobatRepository $dataobatRepo)
    {
        $this->dataobatRepository = $dataobatRepo;
    }

    /**
     * Display a listing of the dataobat.
     *
     * @param dataobatDataTable $dataobatDataTable
     * @return Response
     */
    public function index(dataobatDataTable $dataobatDataTable)
    {
        return $dataobatDataTable->render('dataobats.index');
    }

    /**
     * Show the form for creating a new dataobat.
     *
     * @return Response
     */
    public function create()
    {
        return view('dataobats.create');
    }

    /**
     * Store a newly created dataobat in storage.
     *
     * @param CreatedataobatRequest $request
     *
     * @return Response
     */
    public function store(CreatedataobatRequest $request)
    {
        $input = $request->all();

        $dataobat = $this->dataobatRepository->create($input);

        Flash::success('Dataobat saved successfully.');

        return redirect(route('dataobats.index'));
    }

    /**
     * Display the specified dataobat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            Flash::error('Dataobat not found');

            return redirect(route('dataobats.index'));
        }

        return view('dataobats.show')->with('dataobat', $dataobat);
    }

    /**
     * Show the form for editing the specified dataobat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            Flash::error('Dataobat not found');

            return redirect(route('dataobats.index'));
        }

        return view('dataobats.edit')->with('dataobat', $dataobat);
    }

    /**
     * Update the specified dataobat in storage.
     *
     * @param  int              $id
     * @param UpdatedataobatRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedataobatRequest $request)
    {
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            Flash::error('Dataobat not found');

            return redirect(route('dataobats.index'));
        }

        $dataobat = $this->dataobatRepository->update($request->all(), $id);

        Flash::success('Dataobat updated successfully.');

        return redirect(route('dataobats.index'));
    }

    /**
     * Remove the specified dataobat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataobat = $this->dataobatRepository->findWithoutFail($id);

        if (empty($dataobat)) {
            Flash::error('Dataobat not found');

            return redirect(route('dataobats.index'));
        }

        $this->dataobatRepository->delete($id);

        Flash::success('Dataobat deleted successfully.');

        return redirect(route('dataobats.index'));
    }
}
