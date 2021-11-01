<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class areaChildrenRequest extends FormRequest
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
            'district_id'=>'required|integer',
            'area_id'=>'required|integer',
            'name'=>'required|string|max:255',
            'gender'=>'required',
            'birthDate'=>'required|date_format:Y-m-d',
            'region_id'=>'required|integer',
            'nationality'=>'required|string|max:255',
            'maritalStatus'=>'required',
            'fathers_name'=>'required',
            'fathers_hometown'=>'required',
            'mothers_name'=>'required',
            'mothers_hometown'=>'required',
            'mobileNumber1'=>'unique:users|min:10|max:10|nullable:mobileNumber1',
            'mobileNumber2'=>'unique:users|min:10|max:10|nullable:mobileNumber2',
            'workNumber'=>'unique:users|min:10|max:10|nullable:workNumber',
            'whatsappNumber'=>'unique:users|min:10|max:10|nullable:whatsappNumber',
            'email'=>'unique:users|nullable:email',
            'languagess'=>'required',
            'officeHeld'=>'required',

            'datejoinchurch'=>'date_format:Y-m-d|nullable:datejoinchurch' ,
            'baptismDate'=>'date_format:Y-m-d|nullable:baptismDate' ,
            'dateOrdained'=>'date_format:Y-m-d|nullable:dateOrdained' ,
            'is_active'=>'required',
            'password'=>'required|string|min:6',
            'role_id'=>'required|string',
            'members_id'=>'required|unique:users|min:3|max:3',
            'photo_id' => 'mimes:jpeg',
        ];
    }
}
