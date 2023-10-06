<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Template
 *
 * @property int $id
 * @property string $name
 * @property string|null $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $template_url
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|Vcard[] $vcards
 * @property-read int|null $vcards_count
 *
 * @method static Builder|Template newModelQuery()
 * @method static Builder|Template newQuery()
 * @method static Builder|Template query()
 * @method static Builder|Template whereCreatedAt($value)
 * @method static Builder|Template whereId($value)
 * @method static Builder|Template whereName($value)
 * @method static Builder|Template wherePath($value)
 * @method static Builder|Template whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Template extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'templates';

    protected $fillable = [
        'name',
        'path',
    ];

    protected $casts = [
        'name' => 'string',
        'path' => 'string'
    ];

    protected $appends = ['template_url'];

    const TEMPLATE_PATH = 'template';

    public function vcards(): HasMany
    {
        return $this->hasMany(Vcard::class, 'template_id', 'id');
    }

    public function getTemplateUrlAttribute(): string
    {
        return asset($this->path);
    }
}
