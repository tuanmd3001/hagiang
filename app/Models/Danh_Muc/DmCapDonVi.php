<?php

namespace App\Models\Danh_Muc;

use Eloquent as Model;

/**
 * Class DmCapDonVi
 * @package App\Models\Danh_Muc
 * @version November 16, 2020, 1:50 pm +07
 *
 * @property string $ten
 * @property string $code
 */
class DmCapDonVi extends Model
{

    public $table = 'dm_cap_don_vi';

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
        'code' => "required|string|max:255|unique:dm_cap_don_vi,code",
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
