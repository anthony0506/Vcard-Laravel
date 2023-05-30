<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DefaultCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Setting::where('key', 'default_currency')->doesntExist()) {
            Setting::create(['key' => 'default_currency', 'value' => 'INR']);
        }
    }
}
