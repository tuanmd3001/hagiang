<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DuAnFdi
 * @package App\Models
 * @version November 12, 2020, 3:29 am UTC
 *
 * @property string $ten
 * @property string $noi_dung
 * @property string $chu_dau_tu
 * @property string $giai_ngan
 * @property string $dia_ban
 * @property string $ket_qua
 */
class DuAnFdi extends Model
{

    public $table = 'du_an_fdis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'noi_dung',
        'chu_dau_tu',
        'giai_ngan',
        'dia_ban',
        'ket_qua'
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
        'chu_dau_tu' => 'string',
        'giai_ngan' => 'string',
        'dia_ban' => 'string',
        'ket_qua' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'chu_dau_tu' => 'required|string|max:255',
        'giai_ngan' => 'required|string',
        'dia_ban' => 'required|string',
        'ket_qua' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
