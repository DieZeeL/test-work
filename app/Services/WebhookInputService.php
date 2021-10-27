<?php


namespace App\Services;


use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Database\QueryException;

class WebhookInputService
{

    public function getNextQuestion(Answer $answer): ?Question
    {
        if($answer->next_question_id !== null){
            return Question::with('answers')->whereId($answer->next_question_id)->first();
        } elseif($answer->question->next_question_id !== null) {
            return Question::with('answers')->whereId($answer->question->next_question_id)->first();
        }
        return null;
    }

    /**
     * @param  Respondent  $respondent
     * @param  Answer  $answer
     * @throws \Exception
     */
    public function saveResults(Respondent $respondent, Answer $answer): bool
    {
        $question = $answer->question;
        $survey = $question->survey;
        try {
            $respondent->answers()->create([
                'survey_id' => $survey->id,
                'question_id' => $question->id,
                'answer_id' => $answer->id
            ]);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
        return true;
    }
}
