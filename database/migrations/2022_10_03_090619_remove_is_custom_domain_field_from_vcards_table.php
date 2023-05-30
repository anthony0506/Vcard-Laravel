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
        if (Schema::hasColumn('vcards', 'is_custom_domain')) {
            Schema::table('vcards', function (Blueprint $table) {
                $table->dropColumn('is_custom_domain');
            });
        }

        Schema::dropIfExists('custom_domain_request');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
