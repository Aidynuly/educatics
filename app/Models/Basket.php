<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Basket
 *
 * @property int $id
 * @property int $user_id
 * @property int $tariff_id
 * @property int $course_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Basket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Basket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Basket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Basket whereUserId($value)
 * @mixin \Eloquent
 */
class Basket extends Model
{
    use HasFactory;

    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_SUCCESS = 'success';
    const STATUS_REJECT = 'reject';

    protected $fillable = [
        'user_id',
        'tariff_id',
        'course_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
