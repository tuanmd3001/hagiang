<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ChuKy
 * @package App\Models
 * @version November 14, 2020, 1:34 pm +07
 *
 * @property string $ten
 * @property string $file
 */
class ChuKy extends Model
{

    public $table = 'chu_kys';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'file' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
