<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

/**
 * Trait Multitenantable
 */
trait Multitenantable
{
    protected static function booted()
    {
        if (Auth::check()) {
            static::saving(function ($modal) {
                if (empty($modal->tenant_id)) {
                    $modal->tenant_id = Auth::user()->tenant_id;
                }
            });
        } else {
            static::saving(function ($modal) {
                $modal->tenant_id = $modal->tenant_id;
            });
        }
    }
}
