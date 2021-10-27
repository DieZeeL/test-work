<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class NextQuestionIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * @var Question $question
     */
    public function run()
    {
        Survey::with('questions')
            ->get()
            ->each(function (Survey $survey) {
                $survey->questions->each(function (Question $question, int $key) use ($survey) {
                    $nextQuestionIdInQuestion = (bool)mt_rand(0, 1);
                    $nextKey = $key + 1;
                    /** @var Question $nextQuestion */
                    if ($nextQuestion = $survey->questions->get($nextKey, false)) {
                        if ($nextQuestionIdInQuestion) {
                            $question->next_question_id = $nextQuestion->id;
                            $question->save();
                        } else {
                            $question->answers()->update(['next_question_id' => $nextQuestion->id]);
                        }
                    }
                });
            });
    }
}
