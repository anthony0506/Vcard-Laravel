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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 191)->unique();
            $table->string('contact')->nullable();
            $table->string('region_code')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('language')->default('en')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('affiliate_code');
            $table->string('affiliate_copy_code');
            $table->boolean('is_paid');
            $table->string('referral_code');
            $table->string('tenant_id', 191);
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
};
