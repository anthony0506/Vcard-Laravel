<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class LanguageTableSeeder
 */
class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'manage_language',
            'display_name' => 'Manage Language',
        ]);
        /** @var Role $adminRole */
        $adminRole = Role::whereName('super_admin')->first();
        $permission = Permission::where('name', 'manage_language')->pluck('name', 'id');
        $adminRole->givePermissionTo($permission);
        Language::create(['name' => 'Arabic', 'iso_code' => 'ar', 'is_default' => false]);
        Language::create(['name' => 'Chinese', 'iso_code' => 'zh', 'is_default' => false]);
        Language::create(['name' => 'English', 'iso_code' => 'en', 'is_default' => true]);
        Language::create(['name' => 'French', 'iso_code' => 'fr', 'is_default' => false]);
        Language::create(['name' => 'German', 'iso_code' => 'de', 'is_default' => false]);
        Language::create(['name' => 'Portuguese', 'iso_code' => 'pt', 'is_default' => false]);
        Language::create(['name' => 'Russian', 'iso_code' => 'ru', 'is_default' => false]);
        Language::create(['name' => 'Spanish', 'iso_code' => 'es', 'is_default' => false]);
        Language::create(['name' => 'Turkish', 'iso_code' => 'tr', 'is_default' => false]);
    }
}
