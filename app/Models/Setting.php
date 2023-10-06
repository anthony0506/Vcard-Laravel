<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Country|null $country
 * @property-read string $favicon_url
 * @property-read string $logo_url
 * @property-read string $front_cms
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereKey($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereValue($value)
 * @mixin Eloquent
 */
class Setting extends Model implements HasMedia
{
    use InteractsWithMedia,HasFactory;

    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'key'                => 'string',
        'value'               => 'string',
    ];

    /**
     * @var array
     */
    public static $rules = [
        'app_name' => 'required|string|max:30',
        'app_logo' => 'nullable|mimes:jpg,jpeg,png,gif',
    ];

    public const PATH = 'settings';

    public const FRONTPATH = 'front_cms';

    public function getLogoUrlAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset($this->value);
    }

    public function getFaviconUrlAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset($this->value);
    }

    public function getfrontCmsAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::FRONTPATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset($this->value);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
