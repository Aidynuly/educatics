<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Moderator
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @method static \Illuminate\Database\Eloquent\Builder|Moderator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Moderator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Moderator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Moderator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderator whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Moderator wherePassword($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\ModeratorFactory factory(...$parameters)
 */
class Moderator extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'login',
        'password',
    ];
}
