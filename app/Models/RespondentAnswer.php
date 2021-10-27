<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\RespondentAnswer
 *
 * @property int $id
 * @property int $respondent_id
 * @property int $survey_id
 * @property int $question_id
 * @property int $answer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Respondent $respondent
 * @method static \Database\Factories\RespondentAnswerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereRespondentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RespondentAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RespondentAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'question_id',
        'answer_id',
        'respondent_id'
    ];

    /**
     * @return BelongsTo
     */
    public function respondent(): BelongsTo
    {
        return $this->belongsTo(Respondent::class);
    }
}
