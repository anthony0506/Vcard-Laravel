<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultCountryCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countryCodeExist = Setting::where('key', 'default_country_code')->exists();

        if (! $countryCodeExist) {
            Setting::create(['key' => 'default_country_code', 'value' => 'in']);
        }
    }
}
