<?php

namespace App\Repositories;

use App\Models\Abtc;
use App\Repositories\BaseRepository;

/**
 * Class AbtcRepository
 * @package App\Repositories
 * @version November 14, 2020, 3:41 am UTC
*/

class AbtcRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ho_ten',
        'so_the',
        'don_vi',
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
        return Abtc::class;
    }
}
