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
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            $table->string('session')->nullable();
            $table->unsignedBigInteger('vcard_id')->nullable();
            $table->string('uri')->nullable();
            $table->string('source')->nullable();
            $table->string('country')->nullable();
            $table->string('browser')->nullable();
            $table->string('device')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('ip')->nullable();
            $table->string('language')->nullable();
            $table->longText('meta')->nullable();
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
        Schema::dropIfExists('analytics');
    }
};
