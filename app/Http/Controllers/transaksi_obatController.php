<?php

namespace App\Http\Controllers;

use App\DataTables\transaksi_obatDataTable;
use App\Http\Requests;
use App\Http\Requests\Createtransaksi_obatRequest;
use App\Http\Requests\Updatetransaksi_obatRequest;
use App\Repositories\transaksi_obatRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\transaksi_obat as TransaksiObat;
use App\Models\dataobat as Dataobat;
class transaksi_obatController extends AppBaseController
{
    /** @var  transaksi_obatRepository */
    private $transaksiObatRepository;

    public function __construct(transaksi_obatRepository $transaksiObatRepo)
    {
        $this->transaksiObatRepository = $transaksiObatRepo;
    }

    /**
     * Display a listing of the transaksi_obat.
     *
     * @param transaksi_obatDataTable $transaksiObatDataTable
     * @return Response
     */
    public function index(transaksi_obatDataTable $transaksiObatDataTable)
    {
        return $transaksiObatDataTable->render('transaksi_obats.index');
    }

    /**
     * Show the form for creating a new transaksi_obat.
     *
     * @return Response
     */
    public function create()
    {
        $data = Dataobat::all();
        return view('transaksi_obats.create',['dataobat'=>$data]);
    }

    /**
     * Store a newly created transaksi_obat in storage.
     *
     * @param Createtransaksi_obatRequest $request
     *
     * @return Response
     */
    public function store(Createtransaksi_obatRequest $request)
    {
        $input = $request->all();

        $transaksiObat = $this->transaksiObatRepository->create($input);

        Flash::success('Transaksi Obat saved successfully.');

        return redirect(route('transaksiObats.index'));
    }

    /**
     * Display the specified transaksi_obat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            Flash::error('Transaksi Obat not found');

            return redirect(route('transaksiObats.index'));
        }

        return view('transaksi_obats.show')->with('transaksiObat', $transaksiObat);
    }

    /**
     * Show the form for editing the specified transaksi_obat.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            Flash::error('Transaksi Obat not found');

            return redirect(route('transaksiObats.index'));
        }

        return view('transaksi_obats.edit')->with('transaksiObat', $transaksiObat);
    }

    /**
     * Update the specified transaksi_obat in storage.
     *
     * @param  int              $id
     * @param Updatetransaksi_obatRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetransaksi_obatRequest $request)
    {
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            Flash::error('Transaksi Obat not found');

            return redirect(route('transaksiObats.index'));
        }

        $transaksiObat = $this->transaksiObatRepository->update($request->all(), $id);

        Flash::success('Transaksi Obat updated successfully.');

        return redirect(route('transaksiObats.index'));
    }

    /**
     * Remove the specified transaksi_obat from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaksiObat = $this->transaksiObatRepository->findWithoutFail($id);

        if (empty($transaksiObat)) {
            Flash::error('Transaksi Obat not found');

            return redirect(route('transaksiObats.index'));
        }

        $this->transaksiObatRepository->delete($id);

        Flash::success('Transaksi Obat deleted successfully.');

        return redirect(route('transaksiObats.index'));
    }
    public function getspesific($id){
        $data = DB::table('dataobats')
        ->join('satuans', 'satuans.id', '=', 'dataobats.id_satuan')
        ->select('dataobats.*', 'satuans.nama_satuan')
        ->where('dataobats.id','=',$id)
        ->get();
        return $data;
    }
    public function getreport(){
        $data = TransaksiObat::all();
        return $data;
    }
}
