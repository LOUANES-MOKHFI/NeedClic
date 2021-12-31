<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email'=> 'required|email|unique:admins,id,'.$this->id,
            'role_id'=> 'required|exists:roles,id',
            'password' => 'required_without:id|min:8,confirmed',
        ];
    }
}
