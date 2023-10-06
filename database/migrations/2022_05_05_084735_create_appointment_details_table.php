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
        Schema::create('appointment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vcard_id');
            $table->boolean('is_paid');
            $table->double('price')->nullable();
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
        Schema::dropIfExists('appointment_details');
    }
};
