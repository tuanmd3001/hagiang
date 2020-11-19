<?php

namespace App\Models;

use App\Models\Danh_Muc\DmLoaiKinhPhi;
use App\Models\Danh_Muc\DmQuocGia;
use Eloquent as Model;

/**
 * Class DoanRa
 * @package App\Models
 * @version November 16, 2020, 7:51 pm +07
 *
 *
 * @property integer $lop_id
 * @property string  $ten
 * @property string  $ngay_sinh
 * @property integer $gioi_tinh
 * @property string  $sdt
 * @property string  $email
 */
class LopDaoTaoThanhVien extends Model
{

    public $table = 'lop_thanh_viens';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'lop_id',
        'ten',
        'ngay_sinh',
        'gioi_tinh',
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
        'lop_id' => 'integer',
        'ten' => 'string',
        'ngay_sinh' => 'string',
        'gioi_tinh' => 'integer',
        'sdt' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lop_id' => 'required|integer',
        'ten' => 'required|string',
        'ngay_sinh' => 'required|string',
        'gioi_tinh' => 'required|integer',
        'sdt' => 'required|string',
        'email' => 'nullable',
    ];
}
