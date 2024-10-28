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
            'user_name' =>  ['required', 'string', 'max:255'],
            'full_name' =>  ['required', 'string', 'max:255'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
