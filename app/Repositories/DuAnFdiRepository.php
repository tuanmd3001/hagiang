<?php

namespace App\Repositories;

use App\Models\DuAnFdi;
use App\Repositories\BaseRepository;

/**
 * Class DuAnFdiRepository
 * @package App\Repositories
 * @version November 12, 2020, 3:29 am UTC
*/

class DuAnFdiRepository extends BaseRepository
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
        return DuAnFdi::class;
    }
}
