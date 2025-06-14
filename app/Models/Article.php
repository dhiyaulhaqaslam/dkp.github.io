<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);  // Menggunakan 'title' untuk slug, bukan 'judul'
            }
        });
    }

    protected $table = 'articles'; // Nama tabel
    protected $fillable = ['title', 'tanggal', 'excerpt', 'content', 'image', 'status', 'slug'];
}
