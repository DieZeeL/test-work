<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class WebhookInputRequest
 * @property int $respondent_id
 * @property int $answer_id
 * @package App\Http\Requests
 */
class WebhookInputRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'respondent_id' => ['required','integer','exists:App\Models\Respondent,id'],
            'answer_id' => ['required','integer','exists:App\Models\Answer,id']
        ];
    }
}
