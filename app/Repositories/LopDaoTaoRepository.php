<?php

namespace App\Repositories;

use App\Models\LopDaoTao;
use App\Repositories\BaseRepository;

/**
 * Class LopDaoTaoRepository
 * @package App\Repositories
 * @version November 19, 2020, 7:46 pm +07
*/

class LopDaoTaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'ten',
        'noi_dung',
        'thoi_gian',
        'dia_diem',
        'so_luong',
        'bao_cao',
        'kinh_phi'
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
        return LopDaoTao::class;
    }
}
