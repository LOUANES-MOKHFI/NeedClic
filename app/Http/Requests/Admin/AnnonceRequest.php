<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnnonceRequest extends FormRequest
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
            'titre'         => 'required',
            //'is_negociable' => 'required|in:0,1',
            'prix'          => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description'   => 'required|min:3',
            'attachments'   => 'required_without:id|array|min:1',
            //'category_id'   => 'required|exists:categories_annonces,id',
        ];
    }
}
