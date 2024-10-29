<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question_id'   =>  Question::factory(),
            'name'          =>  $this->faker->name(),
            'remarks'       =>  $this->faker->sentece(),
            'created_by'    =>  User::factory(),
            'updated_by'    =>  User::factory(),
        ];
    }
}
