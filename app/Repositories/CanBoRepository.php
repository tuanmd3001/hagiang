<?php

namespace App\Repositories;

use App\Models\CanBo;
use App\Repositories\BaseRepository;

/**
 * Class CanBoRepository
 * @package App\Repositories
 * @version November 13, 2020, 1:45 pm UTC
*/

class CanBoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'ngay_sinh',
        'gioi_tinh',
        'sdt',
        'email',
        'noi_cong_tac',
        'noi_o'
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
        return CanBo::class;
    }
}
