<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(186),
        ];
    }

    /**
     * Adds questions to the questionnaire
     *
     * @param  int  $answers
     * @return  QuestionFactory
     */
    public function withAnswers(int $answers = 1): QuestionFactory
    {
        return $this->afterCreating(function (Question $question) use ($answers) {
            Answer::factory()
                ->count($answers)
                ->create([
                    'question_id' => $question->id,
                    'next_question_id' => null,
                ]);
        });
    }

}
