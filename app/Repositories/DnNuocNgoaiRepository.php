<?php

namespace App\Repositories;

use App\Models\DnNuocNgoai;
use App\Repositories\BaseRepository;

/**
 * Class DnNuocNgoaiRepository
 * @package App\Repositories
 * @version November 12, 2020, 3:43 am UTC
*/

class DnNuocNgoaiRepository extends BaseRepository
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
        return DnNuocNgoai::class;
    }
}
