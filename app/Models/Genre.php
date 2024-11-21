<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi ke tabel films (opsional)
    public function films() {
        return $this->hasMany(Film::class, 'genre_id', 'id');
    }
}
