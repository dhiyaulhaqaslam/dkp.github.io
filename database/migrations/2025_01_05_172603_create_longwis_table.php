<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLongwisTable extends Migration
{
    public function up()
    {
        Schema::create('longwis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal');
            $table->string('alamat');
            $table->integer('penduduk');
            $table->integer('rumah');
            $table->decimal('panjang_lorong', 8, 2)->nullable();
            $table->decimal('lebar_depan', 8, 2)->nullable();
            $table->decimal('lebar_tengah', 8, 2)->nullable();
            $table->decimal('lebar_belakang', 8, 2)->nullable();
            $table->string('koordinat_lorong')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('longwis');
    }
}
