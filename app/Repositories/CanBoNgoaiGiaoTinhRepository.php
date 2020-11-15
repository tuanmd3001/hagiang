<?php

namespace App\Repositories;

use App\Models\CanBoNgoaiGiaoTinh;
use App\Repositories\BaseRepository;

/**
 * Class CanBoNgoaiGiaoTinhRepository
 * @package App\Repositories
 * @version November 15, 2020, 4:42 pm +07
*/

class CanBoNgoaiGiaoTinhRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ho_ten',
        'don_vi',
        'chuc_danh',
        'sdt',
        'email'
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
        return CanBoNgoaiGiaoTinh::class;
    }
}
