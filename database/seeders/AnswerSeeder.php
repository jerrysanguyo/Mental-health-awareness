<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        $answers = [
            // Emotional State
            [
                'question' => "In the past two weeks, how often have you felt down, depressed, or hopeless?",
                'options' => [
                    'Not at all',
                    'Several days',
                    'More than half the days',
                    'Nearly every day',
                ]
            ],
            // Sleep Patterns
            [
                'question' => "How would you rate the quality of your sleep in the past week?",
                'options' => [
                    'Very poor',
                    'Poor',
                    'Good',
                    'Excellent',
                ]
            ],
            // Energy Levels
            [
                'question' => "How often do you feel exhausted or lacking energy throughout the day?",
                'options' => [
                    'Rarely',
                    'Sometimes',
                    'Often',
                    'Always',
                ]
            ],
            // Social Interaction
            [
                'question' => "How comfortable do you feel in social settings?",
                'options' => [
                    'Very uncomfortable',
                    'Uncomfortable',
                    'Comfortable',
                    'Very comfortable',
                ]
            ],
            // Stress Management
            [
                'question' => "How well are you able to manage stress in your daily life?",
                'options' => [
                    'Not well at all',
                    'Somewhat well',
                    'Well',
                    'Very well',
                ]
            ],
            // General Happiness
            [
                'question' => "Overall, how satisfied are you with your life right now?",
                'options' => [
                    'Very dissatisfied',
                    'Dissatisfied',
                    'Satisfied',
                    'Very satisfied',
                ]
            ],
        ];

        foreach ($answers as $answer) {
            $question = Question::where('name', $answer['question'])->first();

            if (!$question) {
                continue; 
            }

            foreach ($answer['options'] as $option) {
                Answer::create([
                    'question_id' => $question->id,
                    'name' => $option,
                    'remarks' => 'Seeder generated',
                    'created_by' => User::inRandomOrder()->first()->id,
                    'updated_by' => User::inRandomOrder()->first()->id,
                ]);
            }
        }
    }
}
