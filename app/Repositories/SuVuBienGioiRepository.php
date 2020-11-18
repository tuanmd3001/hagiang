<?php

namespace App\Repositories;

use App\Models\SuVuBienGioi;
use App\Repositories\BaseRepository;

/**
 * Class SuVuBienGioiRepository
 * @package App\Repositories
 * @version November 18, 2020, 1:38 pm +07
*/

class SuVuBienGioiRepository extends BaseRepository
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
        return SuVuBienGioi::class;
    }
}
