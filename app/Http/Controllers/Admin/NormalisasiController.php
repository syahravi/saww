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

        // Ambil semua penilaian, pastikan dikelompokkan berdasarkan criteria_id.
        // Gunakan ->all() sebelum groupBy untuk memastikan Collection terbentuk,
        // meskipun groupBy pada Collection kosong tetap aman.
        $penilaianGroupedByCriteria = Penilaian::all()->groupBy('criteria_id');

        $normalisasiData = [];

        // Lakukan normalisasi untuk setiap kriteria
        foreach ($criteria as $c) {
            // Pastikan ada data penilaian untuk kriteria ini sebelum melanjutkan
            if ($penilaianGroupedByCriteria->has($c->id)) {
                $nilaiList = $penilaianGroupedByCriteria[$c->id]->pluck('nilai')->toArray();

                // Pastikan $nilaiList tidak kosong sebelum mencari max/min
                if (empty($nilaiList)) {
                    // Jika tidak ada nilai untuk kriteria ini, lewati atau tetapkan nilai default
                    continue;
                }

                $max = 0; // Default untuk menghindari error jika belum diinisialisasi
                $min = 0; // Default untuk menghindari error jika belum diinisialisasi

                // Cari nilai max atau min sesuai jenis kriteria
                if ($c->type == 'benefit') {
                    // Untuk kriteria 'benefit', ambil nilai maksimum
                    $max = max($nilaiList);
                } else {
                    // Untuk kriteria 'cost', ambil nilai minimum
                    $min = min($nilaiList);
                }

                // Lakukan normalisasi untuk setiap nilai penilaian
                foreach ($penilaianGroupedByCriteria[$c->id] as $p) {
                    $nilaiNormalisasi = 0; // Nilai default

                    if ($c->type == 'benefit') {
                        // Hindari pembagian dengan nol
                        if ($max != 0) {
                            $nilaiNormalisasi = $p->nilai / $max;
                        }
                    } else { // Kriteria 'cost'
                        // Hindari pembagian dengan nol pada $p->nilai
                        if ($p->nilai != 0) {
                            $nilaiNormalisasi = $min / $p->nilai;
                        }
                    }

                    // Simpan normalisasi ke database
                    Normalisasi::updateOrCreate(
                        ['santri_id' => $p->santri_id, 'criteria_id' => $c->id],
                        ['nilai_normalisasi' => $nilaiNormalisasi]
                    );

                    // Menyimpan normalisasi untuk digunakan nanti di view
                    $normalisasiData[$p->santri_id][$c->id] = $nilaiNormalisasi;
                }
            } else {
                // Opsional: Handle jika tidak ada data penilaian untuk kriteria tertentu
                // Misalnya, log pesan atau tetapkan nilai normalisasi 0
                // $this->command->warn("Tidak ada data penilaian untuk kriteria ID: {$c->id}");
            }
        }

        // Return view untuk menampilkan normalisasi yang telah dihitung
        return view('admin.normalisasi.index', compact('santri', 'criteria', 'normalisasiData'));
    }
}
