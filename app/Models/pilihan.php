<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_kriteria', 
        'nama_kriteria',
        'bobot_kriteria',
        'jenis_kriteria',
    ];
    protected $table = 'pilihan';
    // protected $primaryKey = 'kode_kriteria';
    public function namasub (){
         return $this->belongsTo(subkriteria::class);
    }
    public function kode (){
        return $this->belongsTo(matrix::class);
   }
}
