<?php

namespace App\Repositories;

use App\Models\BhNgNuocNgoai;
use App\Repositories\BaseRepository;

/**
 * Class BhNgNuocNgoaiRepository
 * @package App\Repositories
 * @version November 12, 2020, 2:08 pm UTC
*/

class BhNgNuocNgoaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ho_ten',
        'quoc_tich',
        'so_ho_chieu',
        'noi_dung',
        'dia_chi'
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
        return BhNgNuocNgoai::class;
    }
}
