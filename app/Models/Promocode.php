<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promocode
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property int $procent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PromocodeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereProcent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Promocode extends Model
{
    use HasFactory;
}
