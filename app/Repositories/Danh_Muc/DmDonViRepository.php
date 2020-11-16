<?php

namespace App\Repositories\Danh_Muc;

use App\Models\Danh_Muc\DmDonVi;
use App\Repositories\BaseRepository;

/**
 * Class DmDonViRepository
 * @package App\Repositories\Danh_Muc
 * @version November 16, 2020, 2:00 pm +07
*/

class DmDonViRepository extends BaseRepository
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
        return DmDonVi::class;
    }
}
