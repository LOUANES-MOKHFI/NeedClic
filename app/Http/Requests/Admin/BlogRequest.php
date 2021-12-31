<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'description'   => 'nullable|min:3',
            //'attachments'   => 'required_without:id|array|min:1|mimes:jpg,png,jpeg',
            'category_id'   => 'required|exists:categories_blogs,id',
        ];
    }
}
