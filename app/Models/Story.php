<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'description' => 'required',
        'image' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded = [];


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
