<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class XuatNhapKhau
 * @package App\Models
 * @version November 11, 2020, 3:10 pm UTC
 *
 * @property string $ten
 * @property integer $kim_ngach
 * @property integer $loai_hinh
 */
class XuatNhapKhau extends Model
{

    public $table = 'xuat_nhap_khaus';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const TYPE_EXPORT = 1;
    const TYPE_IMPORT = 2;
    const TYPE_OTHER = 3;
    const TYPE_LABEL = [
      self::TYPE_EXPORT => "Xuất khẩu",
      self::TYPE_IMPORT => "Nhập khẩu",
      self::TYPE_OTHER => "Loại hình khác",
    ];


    public $fillable = [
        'ten',
        'kim_ngach',
        'loai_hinh'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'kim_ngach' => 'integer',
        'loai_hinh' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'kim_ngach' => 'required|integer',
        'loai_hinh' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
