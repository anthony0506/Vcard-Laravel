<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Analytic
 *
 * @property int $id
 * @property string|null $session
 * @property int|null $vcard_id
 * @property string|null $uri
 * @property string|null $source
 * @property string|null $country
 * @property string|null $browser
 * @property string|null $device
 * @property string|null $operating_system
 * @property string|null $ip
 * @property string|null $language
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Vcard|null $vcard
 *
 * @method static Builder|Analytic newModelQuery()
 * @method static Builder|Analytic newQuery()
 * @method static Builder|Analytic query()
 * @method static Builder|Analytic whereBrowser($value)
 * @method static Builder|Analytic whereCountry($value)
 * @method static Builder|Analytic whereCreatedAt($value)
 * @method static Builder|Analytic whereDevice($value)
 * @method static Builder|Analytic whereId($value)
 * @method static Builder|Analytic whereIp($value)
 * @method static Builder|Analytic whereLanguage($value)
 * @method static Builder|Analytic whereMeta($value)
 * @method static Builder|Analytic whereOperatingSystem($value)
 * @method static Builder|Analytic whereSession($value)
 * @method static Builder|Analytic whereSource($value)
 * @method static Builder|Analytic whereUpdatedAt($value)
 * @method static Builder|Analytic whereUri($value)
 * @method static Builder|Analytic whereVcardId($value)
 * @mixin Eloquent
 */
class Analytic extends Model
{
    use HasFactory;

    protected $table = 'analytics';

    protected $fillable = [
        'session',
        'vcard_id',
        'uri',
        'source',
        'country',
        'state',
        'browser',
        'device',
        'operating_system',
        'ip',
        'language',
        'meta',
    ];

    protected $casts = [
        'session' => 'string',
        'vcard_id' => 'integer',
        'uri' => 'string',
        'source' => 'string',
        'country' => 'string',
        'state' => 'string',
        'browser' => 'string',
        'device' => 'string',
        'operating_system' => 'string',
        'ip' => 'string',
        'language' => 'string',
        'meta' => 'json',
    ];

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id', 'id');
    }
}
