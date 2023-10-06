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
        Schema::create('plan_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->boolean('products_services')->default(false);
            $table->boolean('testimonials')->default(false);
            $table->boolean('hide_branding')->default(false);
            $table->boolean('enquiry_form')->default(false);
            $table->boolean('social_links')->default(false);
            $table->boolean('password')->default(false);
            $table->boolean('custom_css')->default(false);
            $table->boolean('custom_js')->default(false);
            $table->boolean('custom_fonts')->default(false);
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('plans')
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
        Schema::dropIfExists('plan_features');
    }
};
