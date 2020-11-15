<?php

namespace App\Repositories;

use App\Models\Duqt;
use App\Repositories\BaseRepository;

/**
 * Class DuqtRepository
 * @package App\Repositories
 * @version November 15, 2020, 5:11 pm +07
*/

class DuqtRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'ky_nhan_doan_cap_cao',
        'trong_kh',
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
        return Duqt::class;
    }
}
