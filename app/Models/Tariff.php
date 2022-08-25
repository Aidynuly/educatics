<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tariff
 *
 * @property int $id
 * @property int $title
 * @property int $description
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TariffFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $count
 * @property string|null $background_color
 * @property int $discount
 * @property string|null $old_price
 * @property int|null $discount_text
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereBackgroundColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereDiscountText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tariff whereOldPrice($value)
 */
class Tariff extends Model
{
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'count',
        'background_color',
        'created_at',
        'updated_at',
        'discount',
        'old_price',
        'discount_text',
        'course_text'
    ];
}
