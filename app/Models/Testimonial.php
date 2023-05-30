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
 * App\Models\Testimonial
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $vcard_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $image_url
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Vcard $vcard
 *
 * @method static Builder|Testimonial newModelQuery()
 * @method static Builder|Testimonial newQuery()
 * @method static Builder|Testimonial query()
 * @method static Builder|Testimonial whereCreatedAt($value)
 * @method static Builder|Testimonial whereDescription($value)
 * @method static Builder|Testimonial whereId($value)
 * @method static Builder|Testimonial whereName($value)
 * @method static Builder|Testimonial whereUpdatedAt($value)
 * @method static Builder|Testimonial whereVcardId($value)
 * @mixin Eloquent
 */
class Testimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'testimonials';

    protected $appends = ['image_url'];

    protected $with = ['media'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'vcard_id',
    ];

    protected $casts = [
        'name'        => 'string',
        'description' => 'string',
        'vcard_id'    => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|min:2',
        'description' => 'string',
        'image' => 'required|mimes:jpg,jpeg,png,gif',
    ];

    const TESTIMONIAL_PATH = 'vcards/testimonials';

    public function getImageUrlAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::TESTIMONIAL_PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset('web/media/avatars/150-2.jpg');
    }

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }
}
