<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class attendanceRequest extends FormRequest
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
            'local_id'=>'required|integer',
//            'attendance_categories_id'=>'required|string',
//            'ministers'=>'integer',
//            'elders'=>'integer',
//            'deacon'=>'integer',
//            'deaconess'=>'integer',
//            'male'=>'integer',
//            'female'=>'integer',
//            'children'=>'integer',
//            'visitors'=>'integer',
        ];
    }
}
