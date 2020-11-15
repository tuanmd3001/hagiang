<?php

namespace App\Repositories;

use App\Models\Ttqt;
use App\Repositories\BaseRepository;

/**
 * Class TtqtRepository
 * @package App\Repositories
 * @version November 15, 2020, 8:17 pm +07
*/

class TtqtRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'co_quan_de_xuat',
        'danh_nghia_ky',
        'loai_van_ban',
        'ten_van_ban',
        'nuoc_ky',
        'ten_doi_tac',
        'ngay_ky',
        'tinh_trang_hieu_luc',
        'ngay_hieu_luc',
        'thoi_han_hieu_luc',
        'nguoi_ky',
        'cap_phe_duyet',
        'uy_quyen',
        'ghi_chu'
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
        return Ttqt::class;
    }
}
