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
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property int|null $currency_id
 * @property string|null $price
 * @property string $description
 * @property int $vcard_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $product_url
 * @property-read Currency|null $currency
 * @property-read string $product_icon
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Vcard $vcard
 *
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCurrencyId($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereProductUrl($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereVcardId($value)
 * @mixin Eloquent
 */
class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'products';

    protected $appends = ['product_icon'];

    protected $with = ['media'];

    protected $fillable = [
        'name',
        'currency_id',
        'price',
        'description',
        'vcard_id',
        'product_url',
    ];

    protected $casts = [
        'name'        => 'string',
        'currency_id' => 'integer',
        'price'       => 'string',
        'description' => 'string',
        'vcard_id'    => 'integer',
        'product_url' => 'string',
    ];

    public static $rules = [
        'name' => 'required|string|min:2',
        'price' => 'nullable|numeric|min:0',
        'description' => 'string|min:2|max:200',
        'product_icon' => 'required|mimes:jpg,jpeg,png,gif',
        'product_url' => 'nullable|url',
    ];

    const PRODUCT_PATH = 'vcards/products';

    public function getProductIconAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PRODUCT_PATH)->first();
        if ($media !== null) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_service.png');
    }

    public function vcard(): BelongsTo
    {
        return $this->belongsTo(Vcard::class, 'vcard_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
