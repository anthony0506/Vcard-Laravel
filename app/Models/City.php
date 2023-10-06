<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\City
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read State $state
 *
 * @method static CityFactory factory(...$parameters)
 * @method static Builder|City newModelQuery()
 * @method static Builder|City newQuery()
 * @method static Builder|City query()
 * @method static Builder|City whereCreatedAt($value)
 * @method static Builder|City whereId($value)
 * @method static Builder|City whereName($value)
 * @method static Builder|City whereStateId($value)
 * @method static Builder|City whereUpdatedAt($value)
 * @mixin Eloquent
 */
class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    /**
     * @var array
     */
    protected $fillable = [
        'state_id',
        'name',
    ];

    protected $casts = [
        'state_id' => 'integer',
        'name' => 'string',
    ];
    
    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:180|unique:cities,name,',
        'state_id' => 'required',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
