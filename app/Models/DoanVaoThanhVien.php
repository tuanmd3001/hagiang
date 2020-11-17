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
 * @property integer $doan_vao_id
 * @property integer $can_bo_id
 * @property integer $truong_doan
 * @property string  $ten
 * @property string  $ngay_sinh
 * @property integer $gioi_tinh
 * @property string  $sdt
 * @property string  $email
 * @property string  $noi_cong_tac
 * @property string  $noi_o
 */
class DoanVaoThanhVien extends Model
{

    public $table = 'doan_vao_thanh_vien';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

//    public function canBo()
//    {
//        return $this->hasOne('App\Models\CanBo', 'id', 'can_bo_id');
//    }

    public $fillable = [
        'doan_vao_id',
        'can_bo_id',
        'truong_doan',
        'ten',
        'ngay_sinh',
        'gioi_tinh',
        'sdt',
        'email',
        'noi_cong_tac',
        'noi_o',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'doan_vao_id' => 'integer',
        'can_bo_id' => 'integer',
        'truong_doan' => 'integer',
        'ten' => 'string',
        'ngay_sinh' => 'string',
        'gioi_tinh' => 'integer',
        'sdt' => 'string',
        'email' => 'string',
        'noi_cong_tac' => 'string',
        'noi_o' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'doan_vao_id' => 'required|integer',
        'can_bo_id' => 'nullable|integer',
        'truong_doan' => 'nullable',
        'ten' => 'required|string',
        'ngay_sinh' => 'required|string',
        'gioi_tinh' => 'required|integer',
        'sdt' => 'required|string',
        'email' => 'required|string',
        'noi_cong_tac' => 'required|string',
        'noi_o' => 'required|string',
    ];
}
