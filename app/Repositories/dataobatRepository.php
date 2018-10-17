<?php

namespace App\Repositories;

use App\Models\dataobat;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class dataobatRepository
 * @package App\Repositories
 * @version October 17, 2018, 4:00 pm UTC
 *
 * @method dataobat findWithoutFail($id, $columns = ['*'])
 * @method dataobat find($id, $columns = ['*'])
 * @method dataobat first($columns = ['*'])
*/
class dataobatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_obat',
        'id_satuan',
        'jumlah',
        'harga',
        'kode_obat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return dataobat::class;
    }
}
