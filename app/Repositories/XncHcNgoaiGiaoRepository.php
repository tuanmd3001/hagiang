<?php

namespace App\Repositories;

use App\Models\XncHcNgoaiGiao;
use App\Repositories\BaseRepository;

/**
 * Class XncHcNgoaiGiaoRepository
 * @package App\Repositories
 * @version November 14, 2020, 11:08 am +07
*/

class XncHcNgoaiGiaoRepository extends BaseRepository
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
        return XncHcNgoaiGiao::class;
    }
}
