<?php

namespace App\Services\CMS;

use App\{
    Models\Answer,
};

use Illuminate\{
    Support\Facades\Auth,
};

class AnswerService
{
    public function store(array $data): Answer
    {
        return Answer::create([
            'question_id'   =>  $data['question_id'],
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'created_by'    =>  Auth::user()->id,
            'updated_by'    =>  Auth::user()->id,
        ]);
    }
    
    public function update(array $data, $answer): Answer
    {
        $answer->update([
            'question_id'   =>  $data['question_id'],
            'name'  =>  $data['name'],
            'remarks'   =>  $data['remarks'],
            'updated_by'    =>  Auth::user()->id,
        ]);

        return $answer;
    }

    public function destroy($answer): Answer
    {
        $answer->delete();

        return $answer;
    }
}