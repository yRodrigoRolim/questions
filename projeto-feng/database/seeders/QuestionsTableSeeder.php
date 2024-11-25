<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        Question::factory(10)->create(); // Cria 10 perguntas aleatórias
    }
}
