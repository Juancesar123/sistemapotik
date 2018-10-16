<?php

namespace App\Repositories;

use App\Models\satuan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class satuanRepository
 * @package App\Repositories
 * @version October 16, 2018, 4:26 pm UTC
 *
 * @method satuan findWithoutFail($id, $columns = ['*'])
 * @method satuan find($id, $columns = ['*'])
 * @method satuan first($columns = ['*'])
*/
class satuanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_satuan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return satuan::class;
    }
}
