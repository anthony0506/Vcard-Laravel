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
 * App\Models\AboutUs
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $about_url
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static Builder|AboutUs newModelQuery()
 * @method static Builder|AboutUs newQuery()
 * @method static Builder|AboutUs query()
 * @method static Builder|AboutUs whereCreatedAt($value)
 * @method static Builder|AboutUs whereDescription($value)
 * @method static Builder|AboutUs whereId($value)
 * @method static Builder|AboutUs whereTitle($value)
 * @method static Builder|AboutUs whereUpdatedAt($value)
 * @mixin Eloquent
 */
class AboutUs extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * @var mixed
     */
    protected $table = 'about_us';

    protected $appends = ['about_url'];

    protected $fillable = [
        'title',
        'description',
    ];
    
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
    ];
    
    public static $rules = [
        'title.*' => 'string|max:100',
        'description.*' => 'string|max:500',
        'image.*' => 'mimes:jpg,bmp,png,apng,avif,jpeg,gif',
    ];

    const PATH = 'aboutUs';

    public function getAboutUrlAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset('front/images/about.png');
    }
}
