<?php

namespace App\Repositories\Danh_Muc;

use App\Models\Danh_Muc\DmCapDonVi;
use App\Repositories\BaseRepository;

/**
 * Class DmCapDonViRepository
 * @package App\Repositories\Danh_Muc
 * @version November 10, 2020, 10:35 am UTC
*/

class DmCapDonViRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten'
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
        return DmCapDonVi::class;
    }
}
