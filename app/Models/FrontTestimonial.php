<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\FrontTestimonial
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $testimonial_url
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static Builder|FrontTestimonial newModelQuery()
 * @method static Builder|FrontTestimonial newQuery()
 * @method static Builder|FrontTestimonial query()
 * @method static Builder|FrontTestimonial whereCreatedAt($value)
 * @method static Builder|FrontTestimonial whereDescription($value)
 * @method static Builder|FrontTestimonial whereId($value)
 * @method static Builder|FrontTestimonial whereName($value)
 * @method static Builder|FrontTestimonial whereUpdatedAt($value)
 * @mixin Eloquent
 */
class FrontTestimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'front_testimonials';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
    ];
    
    const PATH = 'testimonials';

    protected $appends = ['testimonial_url'];

    public static $rules = [
        'name' => 'string|min:2',
        'description' => 'string',
        'image' => 'required|mimes:jpg,jpeg,png,gif',
    ];

    public function getTestimonialUrlAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset('assets/img/testimonials/male.jpeg');
    }
}
