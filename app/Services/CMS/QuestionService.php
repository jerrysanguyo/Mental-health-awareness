<?php

namespace App\Services\CMS;

use App\{
    Models\Question,
};

use Illuminate\{
    Support\Facades\Auth,
};

class QuestionService
{
    public function store(array $data): Question
    {
        return Question::create([
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'created_by'    =>  Auth::user()->id,
            'updated_by'    =>  Auth::user()->id,
        ]);
    }
    
    public function update(array $data, $question): Question
    {
        $question->update([
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'updated_by'    =>  Auth::user()->id,
        ]);

        return $question;
    }

    public function destroy($question): Question
    {
        $question->delete();

        return $question;
    }
}