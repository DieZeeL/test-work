<?php

namespace App\Http\Controllers;

use App\Dtos\Responses\QuestionResponseData;
use App\Http\Requests\WebhookInputRequest;
use App\Models\Answer;
use App\Models\Respondent;
use App\Services\WebhookInputService;

class WebhookController extends Controller
{

    /**
     * @param  WebhookInputRequest  $request
     * @param  WebhookInputService  $webhookInputService
     * @return \Illuminate\Http\JsonResponse
     */
    public function input(WebhookInputRequest $request, WebhookInputService $webhookInputService)
    {
        $respondent = Respondent::find($request->respondent_id);
        $answer = Answer::find($request->answer_id);

        try {
            $webhookInputService->saveResults($respondent, $answer);
            $nextQuestion = $webhookInputService->getNextQuestion($answer);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }

        if ($nextQuestion === null) {
            return response()->json([
                'status' => 'no_more',
                'message' => 'Thanks, there are no more questions for you!'
            ]);
        }

        $dto = QuestionResponseData::fromModel($nextQuestion);
        return response()->json([
            'status' => 'next_question',
            'data' => $dto->toArray()
        ]);
    }
}
