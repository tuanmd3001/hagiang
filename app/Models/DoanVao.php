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
 * @property integer $level
 * @property string $ten_doan
 * @property integer $nuoc_den
 * @property string $doi_tac
 * @property string $noi_dung
 * @property integer $so_nguoi
 * @property string $thoi_gian
 * @property integer $kinh_phi
 * @property string $bao_cao
 * @property integer $trong_kh
 */
class DoanVao extends Model
{

    public $table = 'doan_vaos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const LEVEL_TINH = 1;
    const LEVEL_HUYEN = 2;
    const LEVEL_XA = 3;
    const LEVEL_LABEL = [
        self::LEVEL_TINH => "Tỉnh",
        self::LEVEL_HUYEN => "Huyện",
        self::LEVEL_XA => "Xã"
    ];
    const ROUTE_NAME = [
        self::LEVEL_TINH => "doanVaoCapTinh",
        self::LEVEL_HUYEN => "doanVaoCapHuyen",
        self::LEVEL_XA => "doanVaoCapXa"
    ];


    public $fillable = [
        'level',
        'ten_doan',
        'nuoc_den',
        'doi_tac',
        'noi_dung',
        'thoi_gian',
        'kinh_phi',
        'bao_cao',
        'trong_kh',
        'ghi_chu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'level' => 'integer',
        'ten_doan' => 'string',
        'nuoc_den' => 'integer',
        'doi_tac' => 'string',
        'noi_dung' => 'string',
        'thoi_gian' => 'string',
        'kinh_phi' => 'integer',
        'bao_cao' => 'string',
        'trong_kh' => 'integer',
        'ghi_chu' => 'string'
    ];

    protected $appends = [
        'ten_nuoc_den',
        'ten_kinh_phi'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten_doan' => 'required|string|max:255',
        'nuoc_den' => 'required|integer',
        'doi_tac' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'thoi_gian' => 'required',
        'kinh_phi' => 'required|integer',
        'bao_cao' => 'required|string|max:255',
        'members' => 'required',
        'truong_doan' => 'required',
        'trong_kh' => 'nullable',
        'ghi_chu' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public static $messages = [
        'members.required' => 'Vui lòng chọn thành viên đoàn',
        'truong_doan.required' => 'Vui lòng chọn trưởng đoàn'
    ];

    public function getTenNuocDenAttribute()
    {
        $quoc_gia = DmQuocGia::find($this->nuoc_den);
        if ($quoc_gia){
            return $quoc_gia->ten;
        }
        return "";
    }

    public function getTenKinhPhiAttribute()
    {
        $kinh_phi = DmLoaiKinhPhi::find($this->kinh_phi);
        if ($kinh_phi){
            return $kinh_phi->ten;
        }
        return "";
    }

}
