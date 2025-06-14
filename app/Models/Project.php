<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', // Ganti 'name' menjadi 'nama'
        'tanggal',
        'description',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];
}

