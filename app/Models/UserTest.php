<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserTest
 *
 * @property int $id
 * @property int $user_id
 * @property int $test_id
 * @property int $question_id
 * @property int $answer_id
 * @property int $is_correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereUserId($value)
 * @mixin \Eloquent
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|UserTest whereStatus($value)
 */
class UserTest extends Model
{
    use HasFactory;

    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_FINISHED = 'finished';
    const STATUS_DECLINED = 'declined';

    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
        'is_correct',
        'created_at',
        'updated_at',
        'test_id',
        'status'
    ];
}
