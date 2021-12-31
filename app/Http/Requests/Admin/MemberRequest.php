<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email'=> 'required|email|unique:admins,id,'.$this->email,
            'adress' => 'required|min:3',
            'phone' => 'required|min:9|max:11',
            'date_nais' => 'required',
            'cabinet_id' => 'required_without:id|exists:cabinets,id',
            'role_id'    => 'required_without:id|exists:roles,id',
            'password' => 'required_without:id|confirmed',
        ];
    }
}
