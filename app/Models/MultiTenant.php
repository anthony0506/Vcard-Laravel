<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Database\TenantCollection;
use Stancl\Tenancy\Events\CreatingTenant;
use Stancl\Tenancy\Events\DeletingTenant;
use Stancl\Tenancy\Events\SavingTenant;
use Stancl\Tenancy\Events\TenantDeleted;
use Stancl\Tenancy\Events\TenantSaved;
use Stancl\Tenancy\Events\TenantUpdated;
use Stancl\Tenancy\Events\UpdatingTenant;

/**
 * App\Models\MultiTenant
 *
 * @property string $id
 * @property string $tenant_username
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property array|null $data
 * @property-read User|null $user
 *
 * @method static TenantCollection|static[] all($columns = ['*'])
 * @method static TenantCollection|static[] get($columns = ['*'])
 * @method static Builder|MultiTenant newModelQuery()
 * @method static Builder|MultiTenant newQuery()
 * @method static Builder|MultiTenant query()
 * @method static Builder|MultiTenant whereCreatedAt($value)
 * @method static Builder|MultiTenant whereData($value)
 * @method static Builder|MultiTenant whereId($value)
 * @method static Builder|MultiTenant whereTenantUsername($value)
 * @method static Builder|MultiTenant whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MultiTenant extends BaseTenant
{
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'tenant_username',
        ];
    }

    protected $casts = [
        'data' => 'array',
    ];

    protected $dispatchesEvents = [
        'saving' => SavingTenant::class,
        'saved' => TenantSaved::class,
        'creating' => CreatingTenant::class,
        'updating' => UpdatingTenant::class,
        'updated' => TenantUpdated::class,
        'deleting' => DeletingTenant::class,
        'deleted' => TenantDeleted::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'tenant_id');
    }
}
