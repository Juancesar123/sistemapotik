<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="dataobat",
 *      required={"nama_obat", "id_satuan", "jumlah", "harga", "kode_obat"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama_obat",
 *          description="nama_obat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="id_satuan",
 *          description="id_satuan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="harga",
 *          description="harga",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kode_obat",
 *          description="kode_obat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class dataobat extends Model
{
    use SoftDeletes;

    public $table = 'dataobats';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_obat',
        'id_satuan',
        'jumlah',
        'harga',
        'kode_obat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_obat' => 'string',
        'id_satuan' => 'integer',
        'harga' => 'string',
        'kode_obat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_obat' => 'required',
        'id_satuan' => 'required',
        'jumlah' => 'required',
        'harga' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class, 'id_satuan', 'id');
    }
}
