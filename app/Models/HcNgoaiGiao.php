<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class HcNgoaiGiao
 * @package App\Models
 * @version November 13, 2020, 2:59 pm UTC
 *
 * @property string $so_ho_chieu
 * @property string $ho_ten
 * @property string $don_vi
 * @property string $thoi_han
 * @property integer $loai
 */
class HcNgoaiGiao extends Model
{

    public $table = 'hc_ngoai_giaos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'so_ho_chieu',
        'ho_ten',
        'don_vi',
        'thoi_han',
        'loai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'so_ho_chieu' => 'string',
        'ho_ten' => 'string',
        'don_vi' => 'string',
        'thoi_han' => 'string',
        'loai' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'so_ho_chieu' => 'required|string|max:255',
        'ho_ten' => 'required|string|max:255',
        'don_vi' => 'required|string|max:255',
        'thoi_han' => 'required',
        'loai' => 'integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
