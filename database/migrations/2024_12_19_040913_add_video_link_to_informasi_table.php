<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('informasi', function (Blueprint $table) {
            $table->string('video_link')->nullable()->after('gambar');
        });
    }

    public function down()
    {
        Schema::table('informasi', function (Blueprint $table) {
            $table->dropColumn('video_link');
        });
    }

};
