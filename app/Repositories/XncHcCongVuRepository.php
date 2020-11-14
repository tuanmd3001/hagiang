<?php

namespace App\Repositories;

use App\Models\XncHcCongVu;
use App\Repositories\BaseRepository;

/**
 * Class XncHcCongVuRepository
 * @package App\Repositories
 * @version November 14, 2020, 12:05 pm +07
*/

class XncHcCongVuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hc_id',
        'ngay_xnc',
        'noi_dung'
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
        return XncHcCongVu::class;
    }
}
