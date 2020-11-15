<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Ttqt
 * @package App\Models
 * @version November 15, 2020, 8:17 pm +07
 *
 * @property integer $type
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
 * @property integer $uy_quyen
 * @property string $ghi_chu
 */
class Ttqt extends Model
{

    public $table = 'ttqts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const LEVEL_TINH = 1;
    const LEVEL_SO = 2;
    const LEVEL_TP = 3;
    const LEVEL_LABEL = [
        self::LEVEL_TINH => "Cấp tỉnh",
        self::LEVEL_SO => "Cấp sở",
        self::LEVEL_TP => "Cấp địa phương trực thuộc",
    ];

    const TYPE_BBGN = 1;
    const TYPE_BBHD = 2;
    const TYPE_TT = 3;
    const TYPE_LABEL = [
        self::TYPE_BBGN => "Biên bản ghi nhớ",
        self::TYPE_BBHD => "Biên bản hội đàm",
        self::TYPE_TT => "Thỏa thuân",
    ];

    const STATUS_IN_EFFECT = 3;
    const STATUS_EXPIRED = 4;
    const STATUS_LABEL = [
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
        'uy_quyen',
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
        'uy_quyen' => 'integer',
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
        'uy_quyen' => 'nullable',
        'ghi_chu' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
