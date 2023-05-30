<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appLogoUrl = ('/assets/images/infyom-logo.png');
        $faviconUrl = ('/web/media/logos/favicon-infyom.png');

        Setting::create(['key' => 'app_name', 'value' => 'InfyVCards-SaaS']);
        Setting::create(['key' => 'app_logo', 'value' => $appLogoUrl]);
        Setting::create(['key' => 'favicon', 'value' => $faviconUrl]);
        Setting::create(['key' => 'email', 'value' => 'vcards@gmail.com']);
        Setting::create(['key' => 'phone', 'value' => '9876543210']);
        Setting::create(['key' => 'address',
            'value' => 'C-303, Atlanta Shopping Mall, Nr. Sudama Chowk, Mota Varachha, Surat - 394101, Gujarat, India.',
        ]);
        Setting::create(['key' => 'prefix_code', 'value' => '91']);
        Setting::create(['key' => 'plan_expire_notification', 'value' => '5']);
    }
}
