<?php

namespace App\DataTables;

use App\Models\transaksi_obat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class transaksi_obatDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'transaksi_obats.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(transaksi_obat $model)
    {
        return $model->newQuery()->join('satuans', 'transaksi_obats.satuan', '=', 'satuans.id')
        ->join('dataobats', 'transaksi_obats.kd_obat', '=', 'dataobats.id')
        ->select('transaksi_obats.*','satuans.nama_satuan','dataobats.nama_obat','dataobats.kode_obat');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'kode_obat',
            'nama_obat',
            'qty',
            'nama_satuan',
            'total_harga'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transaksi_obatsdatatable_' . time();
    }
}
