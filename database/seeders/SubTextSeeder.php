<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SubTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subtextExist = Setting::where('key', 'sub_text')->exists();
        if (! $subtextExist) {
            Setting::create(['key' => 'sub_text', 'value' => 'Create your business digital card with lots of information.']);
        }
    }
}
