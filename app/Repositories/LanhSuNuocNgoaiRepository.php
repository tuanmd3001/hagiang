<?php

namespace App\Repositories;

use App\Models\LanhSuNuocNgoai;
use App\Repositories\BaseRepository;

/**
 * Class LanhSuNuocNgoaiRepository
 * @package App\Repositories
 * @version November 12, 2020, 1:48 pm UTC
*/

class LanhSuNuocNgoaiRepository extends BaseRepository
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
        return LanhSuNuocNgoai::class;
    }
}
