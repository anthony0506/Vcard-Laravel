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
        Schema::create('appointment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vcard_id');
            $table->string('transaction_id');
            $table->double('amount');
            $table->string('type');
            $table->string('tenant_id', 191);
            $table->boolean('status');
            $table->longText('meta');
            $table->timestamps();
            $table->foreign('vcard_id')->references('id')->on('vcards')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('tenant_id')->references('id')->on('tenants')
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
        Schema::dropIfExists('appointment_transactions');
    }
};
