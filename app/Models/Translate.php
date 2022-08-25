<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translate
 *
 * @property int $id
 * @property string $ru
 * @property string $en
 * @property string $kz
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TranslateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereKz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Translate extends Model
{
    use HasFactory;

    protected $fillable = [
        'ru', 'en', 'kz',
    ];
}
