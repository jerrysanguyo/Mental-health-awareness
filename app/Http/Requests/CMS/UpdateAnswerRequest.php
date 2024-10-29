<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'question_id'   =>  ['required', 'numeric', 'exists:questions,id'],
            'name'          =>  ['required', 'string', 'max:255'],
            'remarks'       =>  ['required', 'string', 'max:255'],
        ];
    }
}
