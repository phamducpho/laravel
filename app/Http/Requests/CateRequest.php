<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
        
          'TenLoai'=>'required|unique:loaihang,TenLoai'



        ];
    }
    public function messages(){

        return [
            'TenLoai.unique'=>'Tên danh mục không đưọc trùng với nhau'

        ];
    }
}
