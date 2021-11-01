<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalsRequest extends FormRequest
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
            'district_id'=>'required',
            'name'=>'required',
            'local_code'=>'required|min:6|max:6',
        ];
    }
}