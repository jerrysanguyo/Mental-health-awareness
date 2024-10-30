<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'name' => "In the past two weeks, how often have you felt down, depressed, or hopeless?",
                'remarks' => 'Emotional state evaluation',
            ],
            [
                'name' => "How would you rate the quality of your sleep in the past week?",
                'remarks' => 'Sleep pattern evaluation',
            ],
            [
                'name' => "How often do you feel exhausted or lacking energy throughout the day?",
                'remarks' => 'Energy level evaluation',
            ],
            [
                'name' => "How comfortable do you feel in social settings?",
                'remarks' => 'Social interaction evaluation',
            ],
            [
                'name' => "How well are you able to manage stress in your daily life?",
                'remarks' => 'Stress management evaluation',
            ],
            [
                'name' => "Overall, how satisfied are you with your life right now?",
                'remarks' => 'General happiness evaluation',
            ],
        ];

        foreach ($questions as $question) {
            Question::create(array_merge($question, [
                'created_by' => 1, 
                'updated_by' => 1,
            ]));
        }
    }
}
