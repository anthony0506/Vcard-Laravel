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
 * App\Models\VcardBlog
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $vcard_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $blog_icon
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Vcard $vcard
 *
 * @method static Builder|VcardBlog newModelQuery()
 * @method static Builder|VcardBlog newQuery()
 * @method static Builder|VcardBlog query()
 * @method static Builder|VcardBlog whereCreatedAt($value)
 * @method static Builder|VcardBlog whereDescription($value)
 * @method static Builder|VcardBlog whereId($value)
 * @method static Builder|VcardBlog whereTitle($value)
 * @method static Builder|VcardBlog whereUpdatedAt($value)
 * @method static Builder|VcardBlog whereVcardId($value)
 * @mixin Eloquent
 */
class VcardBlog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const BLOG_PATH = 'vcards/blogs';

    public static $rules = [
        'title' => 'required|string|min:2|max:50',
        'description' => 'string|required',
        'blog_icon' => 'required|mimes:jpg,jpeg,png,gif',
    ];

    protected $table = 'vcard_blog';

    protected $appends = ['blog_icon'];

    protected $with = ['media'];

    protected $fillable = [
        'title',
        'description',
        'vcard_id',
    ];

    public function getBlogIconAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::BLOG_PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_service.png');
    }

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }
}
