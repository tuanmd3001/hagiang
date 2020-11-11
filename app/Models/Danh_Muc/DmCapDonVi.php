<?php

namespace App\Models\Danh_Muc;

use Eloquent as Model;

/**
 * Class DmCapDonVi
 * @package App\Models\Danh_Muc
 * @version November 10, 2020, 10:35 am UTC
 *
 * @property string $ten
 */
class DmCapDonVi extends Model
{

    public $table = 'dm_cap_don_vi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
