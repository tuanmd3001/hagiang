<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LanhSuNuocNgoai
 * @package App\Models
 * @version November 12, 2020, 1:48 pm UTC
 *
 * @property string $ten
 * @property string $noi_dung
 * @property string $dia_ban
 * @property string $giai_quyet
 */
class LanhSuNuocNgoai extends Model
{

    public $table = 'lanh_su_nuoc_ngoais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'noi_dung',
        'dia_ban',
        'giai_quyet'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'noi_dung' => 'string',
        'dia_ban' => 'string',
        'giai_quyet' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'dia_ban' => 'required|string',
        'giai_quyet' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
