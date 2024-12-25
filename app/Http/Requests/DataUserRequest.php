<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:data_user,email,' . $this->id,
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ];
    }
}
