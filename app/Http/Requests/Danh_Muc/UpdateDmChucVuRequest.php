<?php

namespace App\Http\Requests\Danh_Muc;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Danh_Muc\DmChucVu;

class UpdateDmChucVuRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten' => 'required|string|max:255',
            'code' => "required|string|max:255|unique:dm_chuc_vu,code,{$this->chucVu}",
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }
}