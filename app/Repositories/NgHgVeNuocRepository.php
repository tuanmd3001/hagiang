<?php

namespace App\Repositories;

use App\Models\NgHgVeNuoc;
use App\Repositories\BaseRepository;

/**
 * Class NgHgVeNuocRepository
 * @package App\Repositories
 * @version November 13, 2020, 7:54 am UTC
*/

class NgHgVeNuocRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'quoc_gia',
        'noi_dung',
        'dia_phuong',
        'thoi_gian'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NgHgVeNuoc::class;
    }
}
