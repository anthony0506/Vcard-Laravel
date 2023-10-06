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
        Schema::table('schedule_appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_tran_id')->nullable()->after('to_time');
            $table->foreign('appointment_tran_id')->references('id')->on('appointment_transactions')
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
        Schema::table('schedule_appointments', function (Blueprint $table) {
            //
        });
    }
};
