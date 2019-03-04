<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'nullable',
            //'image' => 'nullable|regex:/^(\+?\d{1,3}\s?\(\d{3}\)\s?\d{3}(-\d{2}){2})?$/',
            'title' => 'required|min:2|max:32',
            //'title' => 'nullable|min:2|max:32',
            'announce' => 'required|min:2',
            //'announce' => 'nullable|min:2',
            'fulltext' => 'required|min:2',
            //'fulltext' => 'nullable|min:2',
            'tagline' => 'nullable|min:2',
            'categories' => 'required|min:2'
        ];
    }
}
