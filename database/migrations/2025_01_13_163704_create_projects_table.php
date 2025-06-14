<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Kolom untuk nama proyek
            $table->date('tanggal')->nullable(); // Kolom untuk tanggal, nullable
            $table->text('description')->nullable(); // Kolom untuk deskripsi, nullable
            $table->enum('status', ['rencana', 'progres', 'arsip']); // Kolom untuk status
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

