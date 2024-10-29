<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

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
                ],
                'recommendations' => [
                    "It seems like you have been feeling quite low recently. Reaching out to a counselor or therapist could help you explore these feelings further. Engaging in activities that you enjoy, even if it's hard, may also help improve your mood.",
                    "It’s common to have some down days. Consider activities that can lift your mood, such as exercise, hobbies, or connecting with friends.",
                ],
            ],
            // Sleep Patterns
            [
                'question' => "How would you rate the quality of your sleep in the past week?",
                'options' => [
                    'Very poor',
                    'Poor',
                    'Good',
                    'Excellent',
                ],
                'recommendations' => [
                    "Poor sleep quality can significantly impact your well-being. Try establishing a bedtime routine, avoiding screens before sleep, and creating a comfortable sleep environment. If issues persist, consider seeking medical advice.",
                    "It sounds like you’re getting good sleep, which is great! Keep maintaining your healthy sleep habits.",
                ],
            ],
            // Add other questions similarly...
        ];

        foreach ($answers as $answer) {
            $question = Question::where('name', $answer['question'])->first();

            if ($question) {
                foreach ($answer['options'] as $option) {
                    Answer::create([
                        'question_id' => $question->id,
                        'name' => $option,
                        'remarks' => $answer['recommendations'][0] ?? 'No remarks available',
                        'created_by' => 1, // Replace with actual user ID or factory-generated value
                        'updated_by' => 1, // Replace with actual user ID or factory-generated value
                    ]);
                }
            }
        }
    }
}
