<?php

namespace App\Repositories;

use App\Models\HcCongVu;
use App\Repositories\BaseRepository;

/**
 * Class HcCongVuRepository
 * @package App\Repositories
 * @version November 13, 2020, 3:33 pm UTC
*/

class HcCongVuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'so_ho_chieu',
        'ho_ten',
        'don_vi',
        'thoi_han',
        'loai'
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
        return HcCongVu::class;
    }
}
