<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    use HasFactory;
    protected $fillable = ['id_kriteria', 'nama_subkriteria', 'nilai_subkriteria'];
    protected $table = 'subkriteria';

    // public function namasub()
    // {
    //     return $this->hasOne(pilihan::class);
    // }
    public function pilihan()
    {
        return $this->belongsTo(pilihan::class, 'id_kriteria', 'id');
    }

    public function matrix()
    {
        return $this->hasMany(matrix::class, 'id_kriteria', 'id_kriteria');
    }
}
