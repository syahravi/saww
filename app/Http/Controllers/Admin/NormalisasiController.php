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
            // Check if the current criteria_id exists in the $penilaian collection
            if (isset($penilaian[$c->id])) {
                $nilaiList = $penilaian[$c->id]->pluck('nilai')->toArray();

                if ($c->jenis == 'benefit') {
                    // Handle case where $nilaiList might be empty to avoid max/min errors
                    $max = !empty($nilaiList) ? max($nilaiList) : 0; // Or a suitable default
                } else {
                    // Handle case where $nilaiList might be empty to avoid max/min errors
                    $min = !empty($nilaiList) ? min($nilaiList) : 0; // Or a suitable default
                }

                foreach ($penilaian[$c->id] as $p) {
                    // Ensure $max or $min is not zero to prevent division by zero errors
                    $nilaiNormalisasi = 0; // Default value in case of division by zero

                    if ($c->jenis == 'benefit') {
                        if ($max != 0) {
                            $nilaiNormalisasi = ($p->nilai / $max);
                        }
                    } else {
                        if ($p->nilai != 0) { // Check $p->nilai to prevent division by zero
                            $nilaiNormalisasi = ($min / $p->nilai);
                        }
                    }

                    // Simpan normalisasi ke database
                    Normalisasi::updateOrCreate(
                        ['santri_id' => $p->santri_id, 'criteria_id' => $c->id],
                        ['nilai_normalisasi' => $nilaiNormalisasi]
                    );

                    $normalisasiData[$p->santri_id][$c->id] = $nilaiNormalisasi;
                }
            }
        }

        return view('admin.normalisasi.index', compact('santri', 'criteria', 'normalisasiData'));
    }
}
