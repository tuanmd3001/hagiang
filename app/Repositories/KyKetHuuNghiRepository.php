<?php

namespace App\Repositories;

use App\Models\KyKetHuuNghi;
use App\Repositories\BaseRepository;

/**
 * Class KyKetHuuNghiRepository
 * @package App\Repositories
 * @version November 18, 2020, 1:41 pm +07
*/

class KyKetHuuNghiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'ngay_ky',
        'tinh_hinh',
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
        return KyKetHuuNghi::class;
    }
}
