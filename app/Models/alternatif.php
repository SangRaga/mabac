<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    use HasFactory;
    protected $fillable = ['kode_alternatif', 'nama_alternatif'];
    protected $table = 'alternatif';
    public function alternatif (){
        return $this->belongsTo(matrix::class);
   }
}
