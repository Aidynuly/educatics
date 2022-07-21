<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sphere
 *
 * @property int $id
 * @property \App\Models\Translate|null $title
 * @property \App\Models\Translate|null $description
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sphere whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sphere extends Model
{
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'description' => 'required',
        'icon' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','icon', 'created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function description()
    {
        return $this->hasOne('App\Models\Translate', 'id', 'description');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function title()
    {
        return $this->hasOne('App\Models\Translate', 'id', 'title');
    }

}
