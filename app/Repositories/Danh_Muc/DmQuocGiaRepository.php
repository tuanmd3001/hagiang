<?php

namespace App\Repositories\Danh_Muc;

use App\Models\Danh_Muc\DmQuocGia;
use App\Repositories\BaseRepository;

/**
 * Class DmQuocGiaRepository
 * @package App\Repositories\Danh_Muc
 * @version November 16, 2020, 2:05 pm +07
*/

class DmQuocGiaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'code'
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
        return DmQuocGia::class;
    }
}
