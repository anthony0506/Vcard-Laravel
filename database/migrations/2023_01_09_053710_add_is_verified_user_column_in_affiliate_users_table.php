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
        Schema::table('affiliate_users', function (Blueprint $table) {
            $table->boolean('is_verified')->after('user_id')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_users', function (Blueprint $table) {
            $table->dropColumn('is_verified');
        });
    }
};
