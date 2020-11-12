<?php

namespace App\Repositories;

use App\Models\DnVonNuocNgoai;
use App\Repositories\BaseRepository;

/**
 * Class DnVonNuocNgoaiRepository
 * @package App\Repositories
 * @version November 12, 2020, 6:43 am UTC
*/

class DnVonNuocNgoaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'noi_dung',
        'so_du_an'
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
        return DnVonNuocNgoai::class;
    }
}
