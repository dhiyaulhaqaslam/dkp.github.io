<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi'; // Pastikan nama tabel sesuai dengan yang ada di database
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'video_link'];

}
