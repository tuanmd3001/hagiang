<?php

namespace App\Repositories;

use App\Models\NgHgNuocNgoai;
use App\Repositories\BaseRepository;

/**
 * Class NgHgNuocNgoaiRepository
 * @package App\Repositories
 * @version November 13, 2020, 7:43 am UTC
*/

class NgHgNuocNgoaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quoc_gia',
        'so_luong',
        'nganh_nghe'
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
        return NgHgNuocNgoai::class;
    }
}
