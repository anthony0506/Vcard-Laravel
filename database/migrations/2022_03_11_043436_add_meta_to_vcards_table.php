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
        Schema::table('vcards', function (Blueprint $table) {
            $table->text('site_title')->nullable()->after('custom_js');
            $table->text('home_title')->nullable()->after('site_title');
            $table->text('meta_keyword')->nullable()->after('home_title');
            $table->text('meta_description')->nullable()->after('meta_keyword');
            $table->longText('google_analytics')->nullable()->after('meta_description');
        });
    }
};
