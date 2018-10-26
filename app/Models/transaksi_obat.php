<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="transaksi_obat",
 *      required={"kd_obat", "qty", "satuan", "total_harga"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="kd_obat",
 *          description="kd_obat",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qty",
 *          description="qty",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="satuan",
 *          description="satuan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_harga",
 *          description="total_harga",
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
class transaksi_obat extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_obats';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kd_obat',
        'qty',
        'satuan',
        'total_harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kd_obat' => 'integer',
        'qty' => 'string',
        'satuan' => 'string',
        'total_harga' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kd_obat' => 'required',
        'qty' => 'required',
        'satuan' => 'required',
        'total_harga' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class, 'satuan', 'id');
    }
}
