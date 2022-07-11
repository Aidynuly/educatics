<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    static $rules = [
        'type' => 'required',
        'name' => 'required',
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
    protected $fillable = [
        'type',
        'name',
        'title',
        'description',
        'image',
        'school_name',
        'created_at',
        'updated_at',
    ];


}
