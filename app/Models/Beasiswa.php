<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    // menambahkan relasi dengan model Pendaftar
    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'beasiswa_id');
    }
}
