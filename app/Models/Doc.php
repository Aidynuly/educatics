<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Doc
 *
 * @property int $id
 * @property string $type
 * @property string $url
 * @method static \Illuminate\Database\Eloquent\Builder|Doc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doc query()
 * @method static \Illuminate\Database\Eloquent\Builder|Doc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doc whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doc whereUrl($value)
 * @mixin \Eloquent
 */
class Doc extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'type','url',
    ];
}
