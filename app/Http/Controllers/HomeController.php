<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Santri;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    // Menampilkan nilai akhir santri
    public function nilaiSantri()
    {
        $nilaiAkhir = Penilaian::selectRaw('santri_id, AVG(nilai) as nilai_akhir')->groupBy('santri_id')->with('santri')->get();

        return view('home.nilai-santri', compact('nilaiAkhir'));
    }

    public function cetakPDF($nama_santri)
    {
        // Cari Santri berdasarkan nama_santri (bukan 'nama')
        $santri = Santri::where('nama_santri', $nama_santri)->firstOrFail();

        // Ambil data penilaian berdasarkan santri_id
        $penilaian = Penilaian::where('santri_id', $santri->id)->with('criteria')->get();

        // Generate PDF
        $pdf = Pdf::loadView('home.penilaian-pdf', compact('santri', 'penilaian'));

        // Download file dengan nama yang benar
        return $pdf->download("penilaian_{$santri->nama_santri}.pdf");
    }
}
