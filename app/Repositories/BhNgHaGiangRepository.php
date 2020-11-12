<?php

namespace App\Repositories;

use App\Models\BhNgHaGiang;
use App\Repositories\BaseRepository;

/**
 * Class BhNgHaGiangRepository
 * @package App\Repositories
 * @version November 12, 2020, 2:24 pm UTC
*/

class BhNgHaGiangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ho_ten',
        'nam_sinh',
        'que_quan',
        'nuoc_lao_dong',
        'nganh_nghe',
        'thoi_han'
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
        return BhNgHaGiang::class;
    }
}
