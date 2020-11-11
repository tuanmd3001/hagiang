<?php

namespace App\Repositories;

use App\Models\DuAnKhac;
use App\Repositories\BaseRepository;

/**
 * Class DuAnKhacRepository
 * @package App\Repositories
 * @version November 11, 2020, 2:39 pm UTC
*/

class DuAnKhacRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'noi_dung',
        'chu_dau_tu',
        'giai_ngan',
        'dia_ban',
        'ket_qua'
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
        return DuAnKhac::class;
    }
}
