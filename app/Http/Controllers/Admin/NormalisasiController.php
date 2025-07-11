<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Normalisasi;
use App\Models\Penilaian;
use App\Models\Santri;
use App\Models\Criteria;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function index()
    {
        $criteria = Criteria::all();
        $santri = Santri::all();

        // Ambil semua penilaian berdasarkan santri dan kriteria
        $penilaian = Penilaian::all()->groupBy('criteria_id');

        $normalisasiData = [];

        foreach ($criteria as $c) {
            $nilaiList = $penilaian[$c->id]->pluck('nilai')->toArray();

            if ($c->jenis == 'benefit') {
                $max = max($nilaiList);
            } else {
                $min = min($nilaiList);
            }

            foreach ($penilaian[$c->id] as $p) {
                $nilaiNormalisasi = $c->jenis == 'benefit' ?
                                    ($p->nilai / $max) :
                                    ($min / $p->nilai);

                // Simpan normalisasi ke database
                Normalisasi::updateOrCreate(
                    ['santri_id' => $p->santri_id, 'criteria_id' => $c->id],
                    ['nilai_normalisasi' => $nilaiNormalisasi]
                );

                $normalisasiData[$p->santri_id][$c->id] = $nilaiNormalisasi;
            }
        }

        return view('admin.normalisasi.index', compact('santri', 'criteria', 'normalisasiData'));
    }
}
