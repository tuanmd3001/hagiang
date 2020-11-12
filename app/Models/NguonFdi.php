<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class NguonFdi
 * @package App\Models
 * @version November 12, 2020, 3:20 am UTC
 *
 * @property string $ten
 * @property integer $tong_von
 * @property string $dia_ban
 */
class NguonFdi extends Model
{

    public $table = 'nguon_fdis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'tong_von',
        'dia_ban'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'tong_von' => 'integer',
        'dia_ban' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'tong_von' => 'required',
        'dia_ban' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
