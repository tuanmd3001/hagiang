<?php

namespace App\Repositories;

use App\Models\ChuKy;
use App\Repositories\BaseRepository;

/**
 * Class ChuKyRepository
 * @package App\Repositories
 * @version November 14, 2020, 1:34 pm +07
*/

class ChuKyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'file'
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
        return ChuKy::class;
    }
}
