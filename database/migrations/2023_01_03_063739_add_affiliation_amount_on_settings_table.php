<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        $setting = \App\Models\Setting::whereKey('affiliation_amount')->first();
        if ($setting) {
            return;
        }
        \App\Models\Setting::Create([
            'key' => 'affiliation_amount',
            'value' => '10',
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        //
    }
};
