<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class NgHgVeNuoc
 * @package App\Models
 * @version November 13, 2020, 7:54 am UTC
 *
 * @property string $ten
 * @property string $quoc_gia
 * @property string $noi_dung
 * @property string $dia_phuong
 * @property string $thoi_gian
 */
class NgHgVeNuoc extends Model
{

    public $table = 'ng_hg_ve_nuocs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'quoc_gia',
        'noi_dung',
        'dia_phuong',
        'thoi_gian'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'quoc_gia' => 'string',
        'noi_dung' => 'string',
        'dia_phuong' => 'string',
        'thoi_gian' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'quoc_gia' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'dia_phuong' => 'required|string|max:255',
        'thoi_gian' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
