<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Respondent
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RespondentAnswer[] $answers
 * @property-read int|null $answers_count
 * @method static \Database\Factories\RespondentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Respondent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Respondent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(RespondentAnswer::class);
    }
}
