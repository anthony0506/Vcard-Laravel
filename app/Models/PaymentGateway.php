<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\PaymentGateway
 *
 * @property int $id
 * @property int $payment_gateway_id
 * @property string $payment_gateway
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|PaymentGateway newModelQuery()
 * @method static Builder|PaymentGateway newQuery()
 * @method static Builder|PaymentGateway query()
 * @method static Builder|PaymentGateway whereCreatedAt($value)
 * @method static Builder|PaymentGateway whereId($value)
 * @method static Builder|PaymentGateway wherePaymentGateway($value)
 * @method static Builder|PaymentGateway wherePaymentGatewayId($value)
 * @method static Builder|PaymentGateway whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PaymentGateway extends Model
{
    use HasFactory;

    protected $table = 'payment_gateways';

    protected $fillable = [
        'payment_gateway_id',
        'payment_gateway',
    ];

    protected $casts = [
        'payment_gateway_id' => 'integer',
        'payment_gateway' => 'string',
    ];
}
