<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Social
 *
 * @property int $id
 * @property string $type
 * @property string $url
 * @method static \Illuminate\Database\Eloquent\Builder|Social newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Social query()
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Social whereUrl($value)
 * @mixin \Eloquent
 */
class Social extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'url',
    ];
}
