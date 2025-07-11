<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criteria';

    protected $fillable = [
        'kriteria',
        'simbol',
        'bobot',
        'type',
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function normalisasi()
    {
        return $this->hasMany(Normalisasi::class);
    }
}
