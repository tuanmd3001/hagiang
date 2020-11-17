<?php

namespace App\Repositories;

use App\Models\DoanRa;
use App\Repositories\BaseRepository;

/**
 * Class DoanRaRepository
 * @package App\Repositories
 * @version November 16, 2020, 7:51 pm +07
*/

class DoanRaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'level',
        'ten_doan',
        'nuoc_di',
        'doi_tac',
        'noi_dung',
        'so_nguoi',
        'thoi_gian',
        'kinh_phi',
        'bao_cao',
        'trong_kh'
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
        return DoanRa::class;
    }
}
