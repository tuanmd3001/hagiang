<?php

namespace App\Repositories;

use App\Models\XuatNhapKhau;
use App\Repositories\BaseRepository;

/**
 * Class XuatNhapKhauRepository
 * @package App\Repositories
 * @version November 11, 2020, 3:10 pm UTC
*/

class XuatNhapKhauRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'kim_ngach',
        'loai_hinh'
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
        return XuatNhapKhau::class;
    }
}
