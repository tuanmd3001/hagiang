<?php

namespace App\Repositories;

use App\Models\HoiNghiHoiThao;
use App\Repositories\BaseRepository;

/**
 * Class HoiNghiHoiThaoRepository
 * @package App\Repositories
 * @version November 10, 2020, 2:23 pm UTC
*/

class HoiNghiHoiThaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'loai',
        'noi_dung',
        'db_vn',
        'db_nn_trong_nuoc',
        'db_nn_ngoai_nuoc',
        'db_cac_nuoc_den',
        'thoi_gian',
        'dia_diem',
        'kinh_phi',
        'bao_cao',
        'trong_kh',
        'cap_cho_phep'
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
        return HoiNghiHoiThao::class;
    }
}
