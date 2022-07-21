<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mainpage
 *
 * @property int $id
 * @property int $title
 * @property int $description
 * @property string|null $icon
 * @property string|null $video_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mainpage whereVideoUrl($value)
 * @mixin \Eloquent
 */
class Mainpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'video_url',
        'created_at',
        'updated_at',
        'block'
    ];
}
