<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $casts = [
        'time' => 'datetime',
    ];
    protected $fillable = ['user_id', 'date', 'type', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

