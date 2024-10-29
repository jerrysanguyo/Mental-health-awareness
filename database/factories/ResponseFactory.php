<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'   =>  User::factory(),
            'question_id'   =>  Question::factory(),
            'answer_id'     =>  Answer::factory(),
        ];
    }
}
