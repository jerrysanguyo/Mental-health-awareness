<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name'  =>  ['required', 'string', 'max:255', 'unique:questions,name'],
            'remarks'   =>  ['required', 'string', 'max:255'],
        ];
    }
}
