<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFreedomwallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nick_name' =>  ['nullable', 'string', 'max:255'],
            'title'     =>  ['required', 'string', 'max:100'],
            'post'      =>  ['required', 'string'],
        ];
    }
}
