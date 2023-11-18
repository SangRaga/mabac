<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    use HasFactory;
    protected $fillable = ['nama_subkriteria', 'nilai_subkriteria'];
    protected $table = 'subkriteria';

    public function namasub()
    {
        return $this->hasOne(pilihan::class);
    }
}
