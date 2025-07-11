<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    use HasFactory;

    protected $table = 'normalisasi';
    protected $fillable = ['santri_id', 'criteria_id', 'nilai_normalisasi'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
