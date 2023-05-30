<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property string $transaction_id
 * @property float $amount
 * @property int $type
 * @property string $tenant_id
 * @property int|null $status
 * @property string|null $meta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read MultiTenant $tenant
 *
 * @method static Builder|Transaction newModelQuery()
 * @method static Builder|Transaction newQuery()
 * @method static Builder|Transaction query()
 * @method static Builder|Transaction whereAmount($value)
 * @method static Builder|Transaction whereCreatedAt($value)
 * @method static Builder|Transaction whereId($value)
 * @method static Builder|Transaction whereMeta($value)
 * @method static Builder|Transaction whereStatus($value)
 * @method static Builder|Transaction whereTenantId($value)
 * @method static Builder|Transaction whereTransactionId($value)
 * @method static Builder|Transaction whereType($value)
 * @method static Builder|Transaction whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Transaction extends Model
{
    use HasFactory, BelongsToTenant, Multitenantable;

    protected $table = 'transactions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'transaction_id',
        'amount',
        'type',
        'tenant_id',
        'status',
        'meta',
    ];

    protected $casts = [
        'transaction_id' => 'string',
        'amount'         => 'double',
        'type'           => 'integer',
        'tenant_id'      => 'string',
        'status'         => 'integer',
        'meta'           => 'json',
    ];

    const SUCCESS = 1;

    const FAILED = 0;

    const STRIPE = 1;
    const PAYPAL = 2;

    const TYPE = [
        self::STRIPE => 'Stripe',
        self::PAYPAL => 'paypal',
    ];
}
