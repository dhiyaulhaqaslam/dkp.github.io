<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'preferences';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'theme',
        'notifications',
    ];

    // Jika menggunakan timestamp (created_at, updated_at), bisa diaktifkan
    public $timestamps = true;
    public function preference()
    {
        return $this->hasOne(Preference::class);
    }

}
