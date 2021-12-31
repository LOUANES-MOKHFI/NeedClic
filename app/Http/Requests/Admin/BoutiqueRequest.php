<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BoutiqueRequest extends FormRequest
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
            'name'     => 'required|min:2',
            'email'    => 'required|email|unique:users,id,'.$this->email,
            'password' => 'required_without:id|confirmed',

            'wilaya_id'  => 'required|exists:wilayas,id',
            'commune_id' => 'required|exists:communes,id',
            'adress'     => 'required|min:3',
            'num_tlfn'   => 'required|min:9|max:11',
            'type_compte'=> 'required|in:3',
        ];
    }
}
