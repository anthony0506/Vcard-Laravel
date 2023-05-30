<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdrawal_id');
            $table->integer('amount');
            $table->integer('paid_by');
            $table->json('payment_meta')->nullable();
            $table->timestamps();

            $table->foreign('withdrawal_id')->references('id')->on('withdrawals');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdrawal_transactions');
    }
};
