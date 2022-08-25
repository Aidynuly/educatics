<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialNetwork
 *
 * @property int $id
 * @property string $type
 * @property string|null $icon
 * @property string $url
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialNetwork whereUrl($value)
 * @mixin \Eloquent
 */
class SocialNetwork extends Model
{
    use HasFactory;
}
