<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CanBoNgoaiGiaoHuyen
 * @package App\Models
 * @version November 15, 2020, 4:53 pm +07
 *
 * @property string $ho_ten
 * @property string $don_vi
 * @property string $chuc_danh
 * @property string $sdt
 * @property string $email
 */
class CanBoNgoaiGiaoHuyen extends Model
{

    public $table = 'can_bo_ngoai_giao_huyens';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ho_ten',
        'don_vi',
        'chuc_danh',
        'sdt',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ho_ten' => 'string',
        'don_vi' => 'string',
        'chuc_danh' => 'string',
        'sdt' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ho_ten' => 'required|string|max:255',
        'don_vi' => 'required|string|max:255',
        'chuc_danh' => 'required|string|max:255',
        'sdt' => 'required|string|max:15',
        'email' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
