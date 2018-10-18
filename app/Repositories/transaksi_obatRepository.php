<?php

namespace App\Repositories;

use App\Models\transaksi_obat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class transaksi_obatRepository
 * @package App\Repositories
 * @version October 18, 2018, 4:29 am UTC
 *
 * @method transaksi_obat findWithoutFail($id, $columns = ['*'])
 * @method transaksi_obat find($id, $columns = ['*'])
 * @method transaksi_obat first($columns = ['*'])
*/
class transaksi_obatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kd_obat',
        'qty',
        'satuan',
        'total_harga'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return transaksi_obat::class;
    }
}
