<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Abtc
 * @package App\Models
 * @version November 14, 2020, 3:41 am UTC
 *
 * @property string $ho_ten
 * @property string $so_the
 * @property string $don_vi
 * @property string $thoi_han
 */
class Abtc extends Model
{

    public $table = 'abtcs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ho_ten',
        'so_the',
        'don_vi',
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
        'so_the' => 'string',
        'don_vi' => 'string',
        'thoi_han' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ho_ten' => 'required|string|max:255',
        'so_the' => 'required|string|max:255',
        'don_vi' => 'required|string|max:255',
        'thoi_han' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
