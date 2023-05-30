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
 * App\Models\AppointmentDetail
 *
 * @property int $id
 * @property int $vcard_id
 * @property int $is_paid
 * @property float|null $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static Builder|AppointmentDetail newModelQuery()
 * @method static Builder|AppointmentDetail newQuery()
 * @method static Builder|AppointmentDetail query()
 * @method static Builder|AppointmentDetail whereCreatedAt($value)
 * @method static Builder|AppointmentDetail whereId($value)
 * @method static Builder|AppointmentDetail whereIsPaid($value)
 * @method static Builder|AppointmentDetail wherePrice($value)
 * @method static Builder|AppointmentDetail whereUpdatedAt($value)
 * @method static Builder|AppointmentDetail whereVcardId($value)
 * @mixin Eloquent
 */
class AppointmentDetail extends Model
{
    use InteractsWithMedia, HasFactory;

    protected $table = 'appointment_details';

    /**
     * @var array
     */
    protected $fillable = [
        'vcard_id',
        'is_paid',
        'price',
    ];

    protected $casts = [
        'vcard_id' => 'integer',
        'is_paid' => 'integer',
        'price' => 'double',
    ];
}
