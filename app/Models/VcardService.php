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
 * App\Models\VcardService
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $vcard_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $service_icon
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Vcard $vcard
 *
 * @method static Builder|VcardService newModelQuery()
 * @method static Builder|VcardService newQuery()
 * @method static Builder|VcardService query()
 * @method static Builder|VcardService whereCreatedAt($value)
 * @method static Builder|VcardService whereDescription($value)
 * @method static Builder|VcardService whereId($value)
 * @method static Builder|VcardService whereName($value)
 * @method static Builder|VcardService whereUpdatedAt($value)
 * @method static Builder|VcardService whereVcardId($value)
 * @mixin Eloquent
 */
class VcardService extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'vcard_services';

    protected $appends = ['service_icon'];

    protected $with = ['media'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'service_url',
        'vcard_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|min:2',
        'description' => 'string',
        'service_icon' => 'required|mimes:jpg,jpeg,png,gif',
        'service_url'   =>  'nullable|url'
    ];

    const SERVICES_PATH = 'vcards/services';

    public function getServiceIconAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::SERVICES_PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_service.png');
    }

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }
}
