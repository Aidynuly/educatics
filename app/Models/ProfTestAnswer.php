<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProfTestAnswer
 *
 * @property int $id
 * @property string $session_id
 * @property int $question_id
 * @property int $answer_id
 * @property int $is_correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|ProfTestAnswer whereStatus($value)
 */
class ProfTestAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'question_id',
        'answer_id',
        'is_correct',
        'created_at',
        'updated_at',
        'status'
    ];
}
