<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxUsersToPreferences extends Migration
{
    public function up()
    {
        Schema::table('preferences', function (Blueprint $table) {
            $table->unsignedInteger('max_users')->default(10); // Default 10 pengguna
        });
    }

    public function down()
    {
        Schema::table('preferences', function (Blueprint $table) {
            $table->dropColumn('max_users');
        });
    }
}
