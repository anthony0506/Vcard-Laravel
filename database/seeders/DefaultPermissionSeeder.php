<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DefaultPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'manage_users',
                'display_name' => 'Manage Users',
            ],
            [
                'name' => 'manage_vcards',
                'display_name' => 'Manage VCards',
            ],
            [
                'name' => 'manage_plans',
                'display_name' => 'Manage Plans',
            ],
            [
                'name' => 'manage_countries',
                'display_name' => 'Manage Countries',
            ],
            [
                'name' => 'manage_roles',
                'display_name' => 'Manage Roles',
            ],
            [
                'name' => 'manage_settings',
                'display_name' => 'Manage Settings',
            ],
            [
                'name' => 'manage_features',
                'display_name' => 'Manage Features',
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
