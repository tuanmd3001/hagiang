<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class XncHcCongVu
 * @package App\Models
 * @version November 14, 2020, 12:05 pm +07
 *
 * @property integer $hc_id
 * @property string $ngay_xnc
 * @property string $noi_dung
 */
class XncHcCongVu extends Model
{

    public $table = 'hc_cong_vu_xncs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'hc_id',
        'ngay_xnc',
        'noi_dung'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hc_id' => 'integer',
        'ngay_xnc' => 'string',
        'noi_dung' => 'string'
    ];

    protected $appends = [
        'ho_ten', 'so_ho_chieu'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hc_id' => 'required|integer',
        'ngay_xnc' => 'required',
        'noi_dung' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function getHoTenAttribute()
    {
        $hc = HcCongVu::find($this->hc_id);
        if ($hc){
            return $hc->ho_ten;
        }
        return "";
    }
    public function getSoHoChieuAttribute()
    {
        $hc = HcCongVu::find($this->hc_id);
        if ($hc){
            return $hc->so_ho_chieu;
        }
        return "";
    }
}
