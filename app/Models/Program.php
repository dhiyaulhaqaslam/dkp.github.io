<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'umur']; // Gunakan 'nama' dan 'umur' sesuai dengan kolom di database
}
