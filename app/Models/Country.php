<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $short_code
 * @property string|null $phone_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static CountryFactory factory(...$parameters)
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country query()
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country wherePhoneCode($value)
 * @method static Builder|Country whereShortCode($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Country extends Model
{
    use HasFactory;

    protected $casts = [
        'name'       => 'string',
        'short_code' => 'string',
        'phone_code' => 'string',
    ];

    protected $table = 'countries';

    /**
     * @var array
     */
    protected $fillable = [
        'short_code',
        'name',
        'phone_code',
    ];
    
    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:180|unique:countries,name,',
        'short_code' => 'required|alpha|unique:countries,short_code,',
        'phone_code' => 'nullable|numeric|unique:countries,phone_code,',
    ];
}
