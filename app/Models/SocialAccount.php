<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\SocialAccount
 *
 * @property int $id
 * @property string $tenant_id
 * @property string $provider
 * @property string $provider_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 *
 * @method static Builder|SocialAccount newModelQuery()
 * @method static Builder|SocialAccount newQuery()
 * @method static Builder|SocialAccount query()
 * @method static Builder|SocialAccount whereCreatedAt($value)
 * @method static Builder|SocialAccount whereId($value)
 * @method static Builder|SocialAccount whereProvider($value)
 * @method static Builder|SocialAccount whereProviderId($value)
 * @method static Builder|SocialAccount whereTenantId($value)
 * @method static Builder|SocialAccount whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SocialAccount extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'social_accounts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'tenant_id',
        'provider',
        'provider_id',
    ];

    protected $casts = [
        'tenant_id'   => 'string',
        'provider'    => 'string',
        'provider_id' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
