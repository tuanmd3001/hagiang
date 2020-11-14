<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CanBo
 * @package App\Models
 * @version November 13, 2020, 1:45 pm UTC
 *
 * @property string $ten
 * @property string $ngay_sinh
 * @property integer $gioi_tinh
 * @property string $sdt
 * @property string $email
 * @property string $noi_cong_tac
 * @property string $noi_o
 */
class CanBo extends Model
{

    public $table = 'can_bos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'ten',
        'ngay_sinh',
        'gioi_tinh',
        'sdt',
        'email',
        'noi_cong_tac',
        'noi_o'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'ngay_sinh' => 'string',
        'gioi_tinh' => 'integer',
        'sdt' => 'string',
        'email' => 'string',
        'noi_cong_tac' => 'string',
        'noi_o' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'ngay_sinh' => 'required',
        'gioi_tinh' => 'required|integer',
        'sdt' => 'required|string|max:15',
        'email' => 'required|string|max:255',
        'noi_cong_tac' => 'required|string|max:255',
        'noi_o' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
