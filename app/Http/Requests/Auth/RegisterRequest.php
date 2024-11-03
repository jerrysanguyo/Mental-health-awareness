<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_name' =>  ['required', 'string', 'max:255', 'unique:users,user_name'],
            'full_name' =>  ['required', 'string', 'max:255', 'unique:users,user_name'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
