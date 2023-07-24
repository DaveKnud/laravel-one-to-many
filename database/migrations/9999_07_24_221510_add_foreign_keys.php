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
        Schema::table('users_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('users_emails', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_addresses', function (Blueprint $table) {

            $table->dropForeign('users_addresses_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('users_emails', function (Blueprint $table) {
            $table->dropForeign('users_emails_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
