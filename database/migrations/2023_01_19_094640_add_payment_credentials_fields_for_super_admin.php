<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        $keys = [
            'stripe_key', 'stripe_secret', 'paypal_client_id', 'paypal_secret', 'razorpay_key', 'razorpay_secret',
        ];

        foreach ($keys as $key) {
            $setting = \App\Models\Setting::where('key', '=', $key)->first();
            if ($setting) {
                continue;
            }
            \App\Models\Setting::Create([
                'key' => $key,
                'value' => '',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        $keys = [
            'stripe_key', 'stripe_secret', 'paypal_client_id', 'paypal_secret', 'razorpay_key',
            'razorpay_secret',
        ];

        foreach ($keys as $key) {
            $setting = \App\Models\Setting::where('key', '=', $key)->first();
            if (!$setting) {
                continue;
            }
            $setting->delete();
        }
    }
};
