<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'priority';

    // Menentukan kolom yang dapat diisi
    protected $fillable = ['judul', 'deskripsi'];
}
