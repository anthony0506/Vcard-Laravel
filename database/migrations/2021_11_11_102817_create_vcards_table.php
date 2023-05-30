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
        Schema::create('vcards', function (Blueprint $table) {
            $table->id();
            $table->string('url_alias', 191)->unique();
            $table->string('name');
            $table->string('occupation');
            $table->text('description');
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('region_code')->nullable();
            $table->double('phone')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('template_id')->nullable();
            $table->boolean('share_btn')->default(true);
            $table->boolean('status')->default(true);
            $table->string('company')->nullable();
            $table->string('job_title')->nullable();
            $table->date('dob')->nullable();
            $table->string('password')->nullable();
            $table->boolean('branding')->default(false);
            $table->string('font_family')->default('Poppins');
            $table->string('font_size')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->string('tenant_id', 191);
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('template_id')->references('id')->on('templates')
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
        Schema::dropIfExists('vcards');
    }
};
