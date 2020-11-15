<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Duqt
 * @package App\Models
 * @version November 15, 2020, 5:11 pm +07
 *
 * @property string $co_quan_de_xuat
 * @property string $danh_nghia_ky
 * @property integer $loai_van_ban
 * @property string $ten_van_ban
 * @property string $nuoc_ky
 * @property string $ten_doi_tac
 * @property string $ngay_ky
 * @property integer $tinh_trang_hieu_luc
 * @property string $ngay_hieu_luc
 * @property string $thoi_han_hieu_luc
 * @property string $nguoi_ky
 * @property string $cap_phe_duyet
 * @property string $ky_nhan_doan_cap_cao
 * @property integer $trong_kh
 * @property string $ghi_chu
 */
class Duqt extends Model
{

    public $table = 'duqts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const TYPE_DUQT = 1;
    const TYPE_TTQT = 2;
    const TYPE_HDQT = 3;
    const TYPE_LABEL = [
      self::TYPE_DUQT => "Điều ước quốc tế",
      self::TYPE_TTQT => "Thỏa thuận quốc tế",
      self::TYPE_HDQT => "Hợp đồng quốc tế",
    ];

    const STATUS_NOT_ACCEPT = 1;
    const STATUS_NOT_APPROVE = 2;
    const STATUS_IN_EFFECT = 3;
    const STATUS_EXPIRED = 4;
    const STATUS_LABEL = [
        self::STATUS_NOT_ACCEPT => "Chưa phê chuẩn",
        self::STATUS_NOT_APPROVE => "Chưa phê duyệt",
        self::STATUS_IN_EFFECT => "Đang hiệu lực",
        self::STATUS_EXPIRED => "Hết hiệu lực",
    ];


    public $fillable = [
        'co_quan_de_xuat',
        'danh_nghia_ky',
        'loai_van_ban',
        'ten_van_ban',
        'nuoc_ky',
        'ten_doi_tac',
        'ngay_ky',
        'tinh_trang_hieu_luc',
        'ngay_hieu_luc',
        'thoi_han_hieu_luc',
        'nguoi_ky',
        'cap_phe_duyet',
        'ky_nhan_doan_cap_cao',
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
        'co_quan_de_xuat' => 'string',
        'danh_nghia_ky' => 'string',
        'loai_van_ban' => 'integer',
        'ten_van_ban' => 'string',
        'nuoc_ky' => 'string',
        'ten_doi_tac' => 'string',
        'ngay_ky' => 'string',
        'tinh_trang_hieu_luc' => 'integer',
        'ngay_hieu_luc' => 'string',
        'thoi_han_hieu_luc' => 'string',
        'nguoi_ky' => 'string',
        'cap_phe_duyet' => 'string',
        'ky_nhan_doan_cap_cao' => 'string',
        'trong_kh' => 'integer',
        'ghi_chu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'co_quan_de_xuat' => 'required|string|max:255',
        'danh_nghia_ky' => 'required|string|max:255',
        'loai_van_ban' => 'required|integer',
        'ten_van_ban' => 'required|string|max:255',
        'nuoc_ky' => 'required|string|max:255',
        'ten_doi_tac' => 'required|string|max:255',
        'ngay_ky' => 'required',
        'tinh_trang_hieu_luc' => 'required|integer',
        'ngay_hieu_luc' => 'required',
        'thoi_han_hieu_luc' => 'required|string|max:255',
        'nguoi_ky' => 'required|string|max:255',
        'cap_phe_duyet' => 'required|string|max:255',
        'ky_nhan_doan_cap_cao' => '',
        'trong_kh' => '',
        'ghi_chu' => '',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
