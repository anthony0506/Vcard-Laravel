<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * App\Models\Subscription
 *
 * @property int $id
 * @property string $tenant_id
 * @property int|null $plan_id
 * @property int|null $transaction_id
 * @property float|null $plan_amount
 * @property float|null $payable_amount
 * @property int $plan_frequency 1 = Month, 2 = Year
 * @property string $starts_at
 * @property string $ends_at
 * @property string|null $trial_ends_at
 * @property float|null $no_of_vcards
 * @property int $status
 * @property string|null $payment_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Plan|null $plan
 * @property-read MultiTenant $tenant
 * @property-read Transaction|null $transactions
 * @property-read Subscription|null $users
 * @property-read MediaCollection|Media[] $media
 *
 * @method static Builder|Subscription newModelQuery()
 * @method static Builder|Subscription newQuery()
 * @method static Builder|Subscription query()
 * @method static Builder|Subscription whereCreatedAt($value)
 * @method static Builder|Subscription whereEndsAt($value)
 * @method static Builder|Subscription whereId($value)
 * @method static Builder|Subscription whereNoOfVcards($value)
 * @method static Builder|Subscription wherePayableAmount($value)
 * @method static Builder|Subscription wherePaymentType($value)
 * @method static Builder|Subscription wherePlanAmount($value)
 * @method static Builder|Subscription wherePlanFrequency($value)
 * @method static Builder|Subscription wherePlanId($value)
 * @method static Builder|Subscription whereStartsAt($value)
 * @method static Builder|Subscription whereStatus($value)
 * @method static Builder|Subscription whereTenantId($value)
 * @method static Builder|Subscription whereTransactionId($value)
 * @method static Builder|Subscription whereTrialEndsAt($value)
 * @method static Builder|Subscription whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Subscription extends Model implements HasMedia
{
    use HasFactory, BelongsToTenant, Multitenantable, InteractsWithMedia;

    protected $table = 'subscriptions';

    const TRIAL_DAYS = 7;

    const TYPE_FREE = 0;

    const TYPE_STRIPE = 1;

    const TYPE_PAYPAL = 2;

    const TYPE_RAZORPAY = 3;

    const STRIPE = 1;

    const PAYPAL = 2;

    const RAZORPAY = 3;

    const MANUALLY = 4;

    const PAYMENT_GATEWAY = [
        self::STRIPE   => 'Stripe',
        self::PAYPAL   => 'Paypal',
        self::RAZORPAY => 'Razorpay',
        self::MANUALLY => 'Manually',
    ];

    const PAYMENT_TYPES = [
        self::TYPE_FREE     => 'Free Plan',
        self::TYPE_STRIPE   => 'Stripe',
        self::TYPE_PAYPAL   => 'PayPal',
        self::TYPE_RAZORPAY => 'RazorPay',
    ];

    const TYPE = [
        'stripe'   => 'Stripe',
        'paypal'   => 'PayPal',
        'razorpay' => 'RazorPay',
        'manually' => 'Manually',
    ];

    const ACTIVE = 1;

    const INACTIVE = 0;

    const STATUS_ARR = [
        self::ACTIVE   => 'Active',
        self::INACTIVE => 'Deactive',
    ];

    const MONTH = 'Month';

    const YEAR = 'Year';

    public const ATTACHMENT_PATH = 'attachment';

    public const NOTES_PATH = 'notes';

    protected $appends = ['attachment'];

    /**
     * @var array
     */
    protected $fillable = [
        'tenant_id',
        'plan_id',
        'transaction_id',
        'plan_amount',
        'discount',
        'payable_amount',
        'plan_frequency',
        'starts_at',
        'ends_at',
        'trial_ends_at',
        'status',
        'coupon_code_meta',
        'no_of_vcards',
        'notes',
        'payment_type',
    ];

    /**
     *
     *
     * @return string
     */
    public function getAttachmentAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::ATTACHMENT_PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }
        return false;
    }

    protected $casts = [
        'tenant_id'        => 'string',
        'plan_id'          => 'integer',
        'transaction_id'   => 'integer',
        'plan_amount'      => 'double',
        'discount'         => 'double',
        'payable_amount'   => 'double',
        'plan_frequency'   => 'integer',
        'starts_at'        => 'datetime',
        'ends_at'          => 'datetime',
        'trial_ends_at'    => 'datetime',
        'status'           => 'integer',
        'coupon_code_meta' => 'json',
        'no_of_vcards'     => 'double',
        'payment_type'     => 'string',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function isExpired(): bool
    {
        $now = Carbon::now();

        if ($this->ends_at > $now) {
            return false;
        }

        // this means the subscription is ended.
        if ((!empty($this->trial_ends_at) && $this->trial_ends_at < $now) || $this->ends_at < $now) {
            return true;
        }

        // this means the subscription is not ended.
        return false;
    }

    public function transactions(): HasOne
    {
        return $this->hasOne(Transaction::class, 'transaction_id', 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
