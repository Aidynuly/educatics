<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TariffText
 *
 * @property int $id
 * @property int $tariff_id
 * @property int $text
 * @method static \Illuminate\Database\Eloquent\Builder|TariffText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TariffText newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TariffText query()
 * @method static \Illuminate\Database\Eloquent\Builder|TariffText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TariffText whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TariffText whereText($value)
 * @mixin \Eloquent
 */
class TariffText extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tariff_id',
        'text',
    ];
}
