<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class localChildrenRequest extends FormRequest
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
        'birthDate'=>'required|string',
        'region_id'=>'required|integer',
//        'nationality'=>'required|string|max:255',
//        'fathers_name'=>'required',
//        'fathers_hometown'=>'required',
//        'mothers_name'=>'required',
//        'mothers_hometown'=>'required',
        'mobileNumber1'=>'min:10|max:10|nullable:mobileNumber1|unique:users,mobileNumber1,'.$this->ministry,
        'mobileNumber2'=>'min:10|max:10|nullable:mobileNumber2|unique:users,mobileNumber2,'.$this->ministry,
        'workNumber'=>'min:10|max:10|nullable:workNumber|unique:users,workNumber,'.$this->ministry,
        'whatsappNumber'=>'min:10|max:10|nullable:whatsappNumber|unique:users,whatsappNumber,'.$this->ministry,
        'email'=>'max:255|nullable:email|unique:users,email,'.$this->ministry,
//        'languagess'=>'required',
        'datejoinchurch'=>'date_format:Y-m-d|nullable:datejoinchurch' ,
        'baptismDate'=>'date_format:Y-m-d|nullable:baptismDate' ,
        'dateOrdained'=>'date_format:Y-m-d|nullable:dateOrdained',
        'is_active'=>'required',
        'password'=>'string|between:6,10|nullable:password',
        'role_id'=>'required|string',
        'members_id'=>'required|min:3|max:4',
        'photo_id' => 'mimes:jpeg',
    ];
    }
}
