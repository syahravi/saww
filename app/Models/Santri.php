<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = 'santri';
    protected $fillable = ['nama_santri'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function normalisasi()
    {
        return $this->hasMany(Normalisasi::class);
    }

    public function nilaiAkhir()
    {
        return $this->hasOne(NilaiAkhir::class);
    }

}
