<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    use HasFactory;

    protected $table = 'nilai_akhir';
    protected $fillable = ['santri_id', 'nilai_saw'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
