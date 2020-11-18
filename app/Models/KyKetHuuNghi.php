<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class KyKetHuuNghi
 * @package App\Models
 * @version November 18, 2020, 1:41 pm +07
 *
 * @property string $ten
 * @property string $ngay_ky
 * @property string $tinh_hinh
 * @property string $ket_qua
 */
class KyKetHuuNghi extends Model
{

    public $table = 'ky_ket_huu_nghis';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'ngay_ky',
        'tinh_hinh',
        'ket_qua'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'ngay_ky' => 'string',
        'tinh_hinh' => 'string',
        'ket_qua' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string',
        'ngay_ky' => 'required',
        'tinh_hinh' => 'required|string|max:255',
        'ket_qua' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
