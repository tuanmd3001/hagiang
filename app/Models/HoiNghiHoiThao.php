<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class HoiNghiHoiThao
 * @package App\Models
 * @version November 10, 2020, 2:23 pm UTC
 *
 * @property integer $loai
 * @property string $ten
 * @property string $noi_dung
 * @property integer $db_vn
 * @property integer $db_nn_trong_nuoc
 * @property integer $db_nn_ngoai_nuoc
 * @property string $db_cac_nuoc_den
 * @property string|\Carbon\Carbon $thoi_gian
 * @property string $dia_diem
 * @property integer $kinh_phi
 * @property string $bao_cao
 * @property integer $trong_kh
 * @property string $cap_cho_phep
 */
class HoiNghiHoiThao extends Model
{

    public $table = 'hoi_nghi_hoi_thao';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const TYPE_HOST = 1;
    const TYPE_JOIN = 2;

    const TYPE_LABEL = [
        self::TYPE_HOST => "Hội nghị, hội thảo chủ trì, tổ chức hoặc tham mưu tỉnh chủ trì tổ chức",
        self::TYPE_JOIN => "Hội nghị, hội thảo cơ quan tham dự hoặc tham mưu tỉnh tham dự"
    ];



    public $fillable = [
        'loai',
        'ten',
        'co_quan',
        'noi_dung',
        'db_vn',
        'db_nn_trong_nuoc',
        'db_nn_ngoai_nuoc',
        'db_cac_nuoc_den',
        'thoi_gian',
        'dia_diem',
        'kinh_phi',
        'bao_cao',
        'trong_kh',
        'cap_cho_phep'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'loai' => 'integer',
        'co_quan' => 'string',
        'noi_dung' => 'string',
        'db_vn' => 'integer',
        'db_nn_trong_nuoc' => 'integer',
        'db_nn_ngoai_nuoc' => 'integer',
        'db_cac_nuoc_den' => 'string',
        'thoi_gian' => 'string',
        'dia_diem' => 'string',
        'kinh_phi' => 'integer',
        'bao_cao' => 'string',
        'trong_kh' => 'integer',
        'cap_cho_phep' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'loai' => 'required|integer',
        'co_quan' => '',
        'noi_dung' => 'required|string',
        'db_vn' => 'required|integer',
        'db_nn_trong_nuoc' => 'required|integer',
        'db_nn_ngoai_nuoc' => 'required|integer',
        'db_cac_nuoc_den' => 'required|string',
        'thoi_gian' => 'required',
        'dia_diem' => 'required|string',
        'kinh_phi' => 'required|integer',
        'bao_cao' => 'required|string',
        'trong_kh' => '',
        'cap_cho_phep' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    protected $appends = [
        'nguon_kinh_phi_label'
    ];

    public function getNguonKinhPhiLabelAttribute()
    {
        $nguon_kinh_phi = [
            ["id" => 1, "name" => "NS tỉnh"],
            ["id" => 2, "name" => "NS ngành"],
            ["id" => 3, "name" => "Đài thọ"],
        ];
        return $nguon_kinh_phi[$this->kinh_phi - 1]['name'];
    }

}
