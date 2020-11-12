<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BhNgHaGiang
 * @package App\Models
 * @version November 12, 2020, 2:24 pm UTC
 *
 * @property string $ho_ten
 * @property string $nam_sinh
 * @property string $que_quan
 * @property string $nuoc_lao_dong
 * @property string $nganh_nghe
 * @property string $thoi_han
 */
class BhNgHaGiang extends Model
{

    public $table = 'bh_ng_ha_giangs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ho_ten',
        'nam_sinh',
        'que_quan',
        'nuoc_lao_dong',
        'nganh_nghe',
        'thoi_han'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ho_ten' => 'string',
        'nam_sinh' => 'string',
        'que_quan' => 'string',
        'nuoc_lao_dong' => 'string',
        'nganh_nghe' => 'string',
        'thoi_han' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ho_ten' => 'required|string|max:255',
        'nam_sinh' => 'required',
        'que_quan' => 'required|string|max:255',
        'nuoc_lao_dong' => 'required|string|max:255',
        'nganh_nghe' => 'required|string|max:255',
        'thoi_han' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
