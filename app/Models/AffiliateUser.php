<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\AffiliateUser
 * @property int $id
 * @property int $affiliated_by
 * @property int $user_id
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $affiliated_by_user
 * @property-read mixed $total_amount
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereAffiliatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereUserId($value)
 * @mixin \Eloquent
 * @property int $is_verified
 * @method static \Illuminate\Database\Eloquent\Builder|AffiliateUser whereIsVerified($value)
 */
class AffiliateUser extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('verifiedUser', function (Builder $builder) {
            $builder->whereIsVerified(true);
        });
    }

    protected $fillable = [
        'affiliated_by',
        'user_id',
        'is_verified',
        'amount',
    ];

    protected $casts = [
        'affiliated_by' => 'integer',
        'user_id'       => 'integer',
        'is_verified'   => 'integer',
        'amount'        => 'integer',
    ];

    protected $appends = ['total_amount'];

    public function affiliated_by_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'affiliated_by');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTotalAmountAttribute()
    {
        return $this->where('affiliated_by', $this->affiliated_by)->sum('amount');
    }
}
