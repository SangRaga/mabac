<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matrix extends Model
{
    use HasFactory;
    public function kode()
    {
        return $this->hasOne(pilihan::class);
    }
    public function alternatif()
    {
        return $this->hasOne(alternatif::class);
    }
}
