<?php

namespace App\Repositories;

use App\Models\NguonFdi;
use App\Repositories\BaseRepository;

/**
 * Class NguonFdiRepository
 * @package App\Repositories
 * @version November 12, 2020, 3:20 am UTC
*/

class NguonFdiRepository extends BaseRepository
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
        return NguonFdi::class;
    }
}
