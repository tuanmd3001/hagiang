<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SuVuBienGioi
 * @package App\Models
 * @version November 18, 2020, 1:38 pm +07
 *
 * @property string $ten
 * @property string $noi_dung
 * @property string $dia_ban
 * @property string $giai_quyet
 */
class SuVuBienGioi extends Model
{

    public $table = 'su_vu_bien_giois';
    
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
        'dia_ban' => 'required|string|max:255',
        'giai_quyet' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
