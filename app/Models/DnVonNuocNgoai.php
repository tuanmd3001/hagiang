<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DnVonNuocNgoai
 * @package App\Models
 * @version November 12, 2020, 6:43 am UTC
 *
 * @property string $ten
 * @property string $noi_dung
 * @property integer $so_du_an
 */
class DnVonNuocNgoai extends Model
{

    public $table = 'dn_von_nuoc_ngoais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'noi_dung',
        'so_du_an'
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
        'so_du_an' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required|string|max:255',
        'noi_dung' => 'required|string',
        'so_du_an' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
