<?php

namespace App\Repositories;

use App\Models\LanhSuTinh;
use App\Repositories\BaseRepository;

/**
 * Class LanhSuTinhRepository
 * @package App\Repositories
 * @version November 12, 2020, 1:32 pm UTC
*/

class LanhSuTinhRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'noi_dung',
        'dia_ban',
        'giai_quyet'
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
        return LanhSuTinh::class;
    }
}
