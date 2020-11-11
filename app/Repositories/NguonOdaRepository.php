<?php

namespace App\Repositories;

use App\Models\NguonOda;
use App\Repositories\BaseRepository;

/**
 * Class NguonOdaRepository
 * @package App\Repositories
 * @version November 11, 2020, 3:52 pm UTC
*/

class NguonOdaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'tong_von',
        'dia_ban'
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
        return NguonOda::class;
    }
}
