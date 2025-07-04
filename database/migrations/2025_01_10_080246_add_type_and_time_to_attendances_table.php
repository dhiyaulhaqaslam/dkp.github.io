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
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('type')->after('date'); // jenis absensi: Hadir, Izin, Sakit
            $table->timestamp('time')->after('type'); // waktu absensi
        });
    }

    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn(['type', 'time']);
        });
    }

};
