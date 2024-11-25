<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = \App\Models\Question::class;

    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),
            'acertos' => $this->faker->numberBetween(0, 50),
            'erros' => $this->faker->numberBetween(0, 50),
        ];
    }
}
