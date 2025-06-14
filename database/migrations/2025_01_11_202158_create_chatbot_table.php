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
        Schema::create('chatbot', function (Blueprint $table) {
            $table->id(); // ID sebagai primary key, auto-increment
            $table->string('pertanyaan'); // Kolom pertanyaan dengan tipe string
            $table->text('jawaban'); // Kolom jawaban dengan tipe teks
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Membalikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chatbot'); // Menghapus tabel chatbot jika ada
    }
};
