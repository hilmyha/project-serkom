<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    
    // menambahkan relasi dengan model Pendaftar
    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'semester_id');
    }
}
