<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NilaiAkhir;
use App\Models\Santri;
use App\Models\Criteria;
use App\Models\Normalisasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import DomPDF

class NilaiAkhirController extends Controller
{
    public function index()
    {
        $santri = Santri::all();
        $criteria = Criteria::all();
        $nilaiAkhirData = [];

        foreach ($santri as $s) {
            $nilai_akhir = 0;

            foreach ($criteria as $c) {
                $nilai_normalisasi = Normalisasi::where('santri_id', $s->id)
                    ->where('criteria_id', $c->id)
                    ->value('nilai_normalisasi') ?? 0;

                $nilai_akhir += $nilai_normalisasi * $c->bobot;
            }

            // Simpan ke database
            NilaiAkhir::updateOrCreate(
                ['santri_id' => $s->id],
                ['nilai_saw' => $nilai_akhir]
            );

            $nilaiAkhirData[$s->id] = $nilai_akhir;
        }

        return view('admin.hasil.index', compact('santri', 'nilaiAkhirData'));
    }

    public function getTopRanking()
{
    // Ambil 3 santri dengan nilai SAW tertinggi
    $topSantri = NilaiAkhir::with('santri')
        ->orderByDesc('nilai_saw')
        ->take(10)
        ->get();

    // Ambil semua data nilai akhir untuk semua santri
    $nilaiAkhirData = NilaiAkhir::with('santri')
        ->orderByDesc('nilai_saw')
        ->get()
        ->pluck('nilai_saw', 'santri_id'); // Format: [santri_id => nilai_saw]

    return view('admin.hasil.top_ranking', compact('topSantri', 'nilaiAkhirData'));
}



public function downloadTopRankingPDF()
{
    // Ambil 10 santri dengan nilai SAW tertinggi
    $topSantri = NilaiAkhir::with('santri')
        ->orderByDesc('nilai_saw')
        ->take(10)
        ->get();

    // Ambil semua data nilai akhir untuk semua santri
    $nilaiAkhirData = NilaiAkhir::with('santri')
        ->orderByDesc('nilai_saw')
        ->get()
        ->pluck('nilai_saw', 'santri_id'); // Format: [santri_id => nilai_saw]

    // Load view ke PDF
    $pdf = Pdf::loadView('admin.hasil.pdf', compact('topSantri', 'nilaiAkhirData'));

    // Download PDF
    return $pdf->download('admin.hasil.pdf');
}

}
