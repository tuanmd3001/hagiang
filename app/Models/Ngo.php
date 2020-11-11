<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Ngo
 * @package App\Models
 * @version November 11, 2020, 1:24 pm UTC
 *
 * @property string $ten
 * @property string $noi_dung
 * @property string $dia_ban
 * @property integer $giay_phep
 */
class Ngo extends Model
{

    public $table = 'ngos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'noi_dung',
        'dia_ban',
        'giay_phep'
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
        'giay_phep' => 'integer'
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
        'giay_phep' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
