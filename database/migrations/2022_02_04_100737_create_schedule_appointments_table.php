<?php

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
        Schema::create('schedule_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vcard_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('date');
            $table->string('from_time');
            $table->string('to_time');
            $table->timestamps();

            $table->foreign('vcard_id')->references('id')->on('vcards')
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
        Schema::dropIfExists('schedule_appointments');
    }
};
