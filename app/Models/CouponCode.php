<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CouponCode
 * @property int $id
 * @property string $coupon_name
 * @property int $type
 * @property int $discount
 * @property string|null $expire_at
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $is_expired
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCouponName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CouponCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_name',
        'type',
        'discount',
        'expire_at',
        'status',
    ];

    const FIXED_TYPE = 1,
        PERCENTAGE_TYPE = 2;

    const TYPE = [
        self::FIXED_TYPE      => 'Fixed',
        self::PERCENTAGE_TYPE => 'Percentage',
    ];

    const ACTIVE = 1,
        INACTIVE = 0;

    const STATUS = [
        self::ACTIVE   => 'Active',
        self::INACTIVE => 'InActive',
    ];

    protected $appends = ['is_expired'];

    public function getIsExpiredAttribute()
    {
        return \Carbon\Carbon::parse($this->expire_at)->isPast();
    }
}
