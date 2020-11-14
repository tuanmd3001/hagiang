<?php

namespace App\Repositories;

use App\Models\HcNgoaiGiao;
use App\Repositories\BaseRepository;

/**
 * Class HcNgoaiGiaoRepository
 * @package App\Repositories
 * @version November 13, 2020, 2:59 pm UTC
*/

class HcNgoaiGiaoRepository extends BaseRepository
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
        return HcNgoaiGiao::class;
    }
}
