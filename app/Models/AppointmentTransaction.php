<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\AppointmentTransaction
 *
 * @property int $id
 * @property int $vcard_id
 * @property string $transaction_id
 * @property int $currency_id
 * @property float $amount
 * @property string $type
 * @property string $tenant_id
 * @property int $status
 * @property string $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Currency $currency
 * @property-read mixed $currency_symbol
 *
 * @method static Builder|AppointmentTransaction newModelQuery()
 * @method static Builder|AppointmentTransaction newQuery()
 * @method static Builder|AppointmentTransaction query()
 * @method static Builder|AppointmentTransaction whereAmount($value)
 * @method static Builder|AppointmentTransaction whereCreatedAt($value)
 * @method static Builder|AppointmentTransaction whereCurrencyId($value)
 * @method static Builder|AppointmentTransaction whereId($value)
 * @method static Builder|AppointmentTransaction whereMeta($value)
 * @method static Builder|AppointmentTransaction whereStatus($value)
 * @method static Builder|AppointmentTransaction whereTenantId($value)
 * @method static Builder|AppointmentTransaction whereTransactionId($value)
 * @method static Builder|AppointmentTransaction whereType($value)
 * @method static Builder|AppointmentTransaction whereUpdatedAt($value)
 * @method static Builder|AppointmentTransaction whereVcardId($value)
 * @mixin Eloquent
 */
class AppointmentTransaction extends Model
{
    use HasFactory;

    protected $table = 'appointment_transactions';

    /**
     * @var array
     */
    protected $fillable = [
        'vcard_id',
        'transaction_id',
        'currency_id',
        'amount',
        'tenant_id',
        'status',
        'type',
        'meta',
    ];

    protected $casts = [
        'vcard_id' => 'integer',
        'transaction_id' => 'string',
        'currency_id' => 'integer',
        'amount' => 'double',
        'tenant_id' => 'string',
        'status' => 'integer',
        'type' => 'string',
        'meta' => 'json',
    ];
    
    protected $appends = ['currency_symbol'];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function getCurrencySymbolAttribute(): string
    {
        return $this->currency->currency_icon;
    }
}
