<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|alpha_num',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'required|same:password',
            'is_confirmed' => 'accepted',
            'phone' => 'nullable|regex:/^(\+?\d{1,3}\s?\(\d{3}\)\s?\d{3}(-\d{2}){2})?$/'
        ];
    }
}
