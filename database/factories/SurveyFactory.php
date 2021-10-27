<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
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
     * @param  int  $questions
     * @return  SurveyFactory
     */
    public function withQuestions(int $questions = 1): SurveyFactory
    {
        return $this->afterCreating(function (Survey $survey) use ($questions) {
            Question::factory()
                ->count($questions)
                ->withAnswers(mt_rand(5,10))
                ->create([
                    'survey_id' => $survey->id,
                ]);
        });
    }
}
