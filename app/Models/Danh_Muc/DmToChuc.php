<?php

namespace App\Models\Danh_Muc;

use Eloquent as Model;

/**
 * Class DmToChuc
 * @package App\Models\Danh_Muc
 * @version November 16, 2020, 2:06 pm +07
 *
 * @property string $ten
 * @property string $code
 */
class DmToChuc extends Model
{

    public $table = 'dm_to_chuc';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:dm_to_chuc,code',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
