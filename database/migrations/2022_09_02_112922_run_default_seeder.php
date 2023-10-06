<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('db:seed', ['--class' => 'SubTextSeeder', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'DefaultCountryCode', '--force' => true]);
        Artisan::call('db:seed', ['--class' => 'DefaultCurrencySeeder', '--force' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
