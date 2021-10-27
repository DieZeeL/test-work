<?php

namespace App\Dtos\Responses;

use App\Dtos\AnswerData;
use Cerbero\LaravelDto\Dto;

use const Cerbero\Dto\IGNORE_UNKNOWN_PROPERTIES;
use const Cerbero\Dto\PARTIAL;

/**
 * The data transfer object for the Audience model.
 *
 * @property int $id
 * @property string $title
 * @property AnswerData[] $answers
 */
class QuestionResponseData extends Dto
{
    /**
     * The default flags.
     *
     * @var int
     */
    protected static $defaultFlags = PARTIAL | IGNORE_UNKNOWN_PROPERTIES;
}
