<?php

namespace App\Repositories;

use App\Models\Ngo;
use App\Repositories\BaseRepository;

/**
 * Class NgoRepository
 * @package App\Repositories
 * @version November 11, 2020, 1:24 pm UTC
*/

class NgoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'noi_dung',
        'dia_ban',
        'giay_phep'
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
        return Ngo::class;
    }
}
