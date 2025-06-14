<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Longwis extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'longwis';

    protected $fillable = [
        'nama',
        'tanggal',
        'alamat',
        'penduduk',
        'rumah',
        'panjang_lorong',
        'lebar_depan',
        'lebar_tengah',
        'lebar_belakang',
        'koordinat_lorong',
        'status'
    ];
    }
