<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        $setting = \App\Models\Setting::where('key', '=', 'paypal_mode')->first();
        if ($setting) {
            return;
        }
        \App\Models\Setting::Create([
            'key'   => 'paypal_mode',
            'value' => 'sandbox',
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        $setting = \App\Models\Setting::where('key', '=', 'paypal_mode')->first();
        if (!$setting) {
            return;
        }
        $setting->delete();
    }
};
