<?php

namespace App\Models;

use App\Models\Danh_Muc\DmLoaiKinhPhi;
use Eloquent as Model;

/**
 * Class LopDaoTao
 * @package App\Models
 * @version November 19, 2020, 7:46 pm +07
 *
 * @property integer $type
 * @property string $ten
 * @property string $noi_dung
 * @property string $thoi_gian
 * @property string $dia_diem
 * @property integer $so_luong
 * @property string $bao_cao
 * @property integer $kinh_phi
 */
class LopDaoTao extends Model
{

    public $table = 'lops';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const TYPE_LOP_DAO_TAO = 1;
    const TYPE_DAO_TAO_NUOC_NGOAI = 2;
    const TYPE_LOP_TUYEN_TRUYEN = 3;
    const TYPE_LABEL = [
        self::TYPE_LOP_DAO_TAO => "Lớp bồi dưỡng đối ngoại",
        self::TYPE_DAO_TAO_NUOC_NGOAI => "Chương trình, dự án đào tạo nước ngoài",
        self::TYPE_LOP_TUYEN_TRUYEN => "Lớp tuyên truyền 03 về văn kiện biên giới"
    ];
    const ROUTE_NAME = [
        self::TYPE_LOP_DAO_TAO => "lopBoiDuongDoiNgoai",
        self::TYPE_DAO_TAO_NUOC_NGOAI => "daoTaoNuocNgoai",
        self::TYPE_LOP_TUYEN_TRUYEN => "lopTuyenTruyen03"
    ];


    public $fillable = [
        'type',
        'ten',
        'noi_dung',
        'thoi_gian',
        'dia_diem',
        'so_luong',
        'bao_cao',
        'kinh_phi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'integer',
        'ten' => 'string',
        'noi_dung' => 'string',
        'thoi_gian' => 'string',
        'dia_diem' => 'string',
        'so_luong' => 'integer',
        'bao_cao' => 'string',
        'kinh_phi' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'thoi_gian' => 'required',
        'dia_diem' => 'required|string|max:255',
        'so_luong' => 'required|integer',
        'bao_cao' => 'required|string|max:255',
        'kinh_phi' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    protected $appends = [
        'ten_kinh_phi'
    ];

    public function getTenKinhPhiAttribute()
    {
        $kinh_phi = DmLoaiKinhPhi::find($this->kinh_phi);
        if ($kinh_phi){
            return $kinh_phi->ten;
        }
        return "";
    }

}
