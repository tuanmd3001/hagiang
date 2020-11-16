<?php

namespace App\Repositories\Danh_Muc;

use App\Models\Danh_Muc\DmChucVu;
use App\Repositories\BaseRepository;

/**
 * Class DmChucVuRepository
 * @package App\Repositories\Danh_Muc
 * @version November 16, 2020, 1:59 pm +07
*/

class DmChucVuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'code'
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
        return DmChucVu::class;
    }
}
