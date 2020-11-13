<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class NgHgNuocNgoai
 * @package App\Models
 * @version November 13, 2020, 7:43 am UTC
 *
 * @property string $quoc_gia
 * @property integer $so_luong
 * @property string $nganh_nghe
 */
class NgHgNuocNgoai extends Model
{

    public $table = 'ng_hg_nuoc_ngoais';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'quoc_gia',
        'so_luong',
        'nganh_nghe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quoc_gia' => 'string',
        'so_luong' => 'integer',
        'nganh_nghe' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quoc_gia' => 'required|string|max:255',
        'so_luong' => 'required|integer',
        'nganh_nghe' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
