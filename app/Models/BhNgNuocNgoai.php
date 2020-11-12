<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BhNgNuocNgoai
 * @package App\Models
 * @version November 12, 2020, 2:08 pm UTC
 *
 * @property string $ho_ten
 * @property string $quoc_tich
 * @property string $so_ho_chieu
 * @property string $noi_dung
 * @property string $dia_chi
 */
class BhNgNuocNgoai extends Model
{

    public $table = 'bh_ng_nuoc_ngoais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ho_ten',
        'quoc_tich',
        'so_ho_chieu',
        'noi_dung',
        'dia_chi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ho_ten' => 'string',
        'quoc_tich' => 'string',
        'so_ho_chieu' => 'string',
        'noi_dung' => 'string',
        'dia_chi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ho_ten' => 'required|string|max:255',
        'quoc_tich' => 'required|string|max:255',
        'so_ho_chieu' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'dia_chi' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
