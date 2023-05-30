<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class ExtraScriptFrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extraScriptFront = Setting::where('key', 'extra_js_front')->exists();

        if (! $extraScriptFront) {
            Setting::create(['key' => 'extra_js_front', 'value' => '']);
        }
    }
}
