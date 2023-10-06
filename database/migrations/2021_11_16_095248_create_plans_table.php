<?php

use App\Models\Plan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('no_of_vcards')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->float('price')->nullable()->default(0);
            $table->integer('frequency')->default(Plan::MONTHLY)->comment('1 = Month, 2 = Year');
            $table->integer('is_default')->default(0);
            $table->integer('trial_days')->default(0)->comment('Default validity will be '.Plan::TRIAL_DAYS.' trial days');
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currencies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
