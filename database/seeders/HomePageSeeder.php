<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePageBanner = ('/front/images/home.png');

        Setting::create(['key' => 'home_page_title', 'value' => 'InfyVCards-SaaS']);
        Setting::create(['key' => 'home_page_banner', 'value' => $homePageBanner]);
    }
}
