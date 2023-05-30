<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property int $user_id
 * @property string $key
 * @property string|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static Builder|UserSetting newModelQuery()
 * @method static Builder|UserSetting newQuery()
 * @method static Builder|UserSetting query()
 * @method static Builder|UserSetting whereCreatedAt($value)
 * @method static Builder|UserSetting whereId($value)
 * @method static Builder|UserSetting whereKey($value)
 * @method static Builder|UserSetting whereUpdatedAt($value)
 * @method static Builder|UserSetting whereUserId($value)
 * @method static Builder|UserSetting whereValue($value)
 * @mixin Eloquent
 */
class UserSetting extends Model
{
    use InteractsWithMedia,HasFactory;

    protected $table = 'user_settings';

    /**
     * @var array
     */
    protected $fillable = [
        'currency_id',
        'user_id',
        'key',
        'value',
    ];

    protected $casts = [
        'user_id'     => 'integer',
        'key'         => 'string',
        'value'       => 'string',
    ];

    const HOUR_24 = 1;

    const HOUR_12 = 0;

    const TIME_FORMAT = [
        self::HOUR_24,
        self::HOUR_12,
    ];
}
