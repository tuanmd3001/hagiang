<?php

namespace App\Repositories\Danh_Muc;

use App\Models\Danh_Muc\DmLoaiVanBan;
use App\Repositories\BaseRepository;

/**
 * Class DmLoaiVanBanRepository
 * @package App\Repositories\Danh_Muc
 * @version November 16, 2020, 2:04 pm +07
*/

class DmLoaiVanBanRepository extends BaseRepository
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
        return DmLoaiVanBan::class;
    }
}
