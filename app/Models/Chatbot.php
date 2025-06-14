<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatbot extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'chatbot';

    // Tentukan field yang dapat diisi (mass assignable)
    protected $fillable = ['pertanyaan', 'jawaban'];
}
