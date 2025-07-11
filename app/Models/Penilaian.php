<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $fillable = ['santri_id', 'criteria_id', 'nilai'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
