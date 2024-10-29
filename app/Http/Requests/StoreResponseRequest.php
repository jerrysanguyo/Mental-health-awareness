<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'responses' => ['required', 'array'],
            'responses.*.question_id' => ['required', 'exists:questions,id'],
            'responses.*.answer_id' => ['required', 'exists:answers,id'],
        ];
    }
}
