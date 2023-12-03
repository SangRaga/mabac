<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matrix extends Model
{
    use HasFactory;

    protected $table = 'matrices';

    protected $fillable = ['id_alternatif', 'id_kriteria', 'C'];

    // public function kode()
    // {
    //     return $this->hasOne(pilihan::class);
    // }
    // public function alternatif()
    // {
    //     return $this->hasOne(alternatif::class);
    // }
    public function alternatif()
    {
        return $this->belongsTo(alternatif::class, 'id_alternatif', 'id');
    }
    public function pilihan()
    {
        return $this->belongsTo(pilihan::class, 'id_kriteria', 'id');
    }
}
