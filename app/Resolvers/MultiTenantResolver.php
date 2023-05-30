<?php

declare(strict_types=1);

namespace App\Resolvers;

use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Exceptions\TenantCouldNotBeIdentifiedByPathException;

class MultiTenantResolver
{
    public function resolve(...$args): Tenant
    {
        if ($tenant = tenancy()->find(getLogInTenantId())) {
            return $tenant;
        }

        throw new TenantCouldNotBeIdentifiedByPathException(getLogInTenantId());
    }

    public function getArgsForTenant(Tenant $tenant): array
    {
        return [
            [$tenant->id],
        ];
    }
}
