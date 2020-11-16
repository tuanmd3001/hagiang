<?php

namespace App\Http\Requests\Danh_Muc;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Danh_Muc\DmQuocGia;

class CreateDmQuocGiaRequest extends FormRequest
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
        return DmQuocGia::$rules;
    }
}
