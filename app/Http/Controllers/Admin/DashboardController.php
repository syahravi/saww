<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Normalisasi;
use App\Models\NilaiAkhir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        // Gunakan caching selama 10 menit untuk mengurangi query ke database
        $statistics = Cache::remember('dashboard_statistics', now()->addMinutes(10), function () {
            return [
                'totalSantri' => Santri::count(),
                'totalCriteria' => Criteria::count(),
                'totalPenilaian' => Penilaian::count(),
                'totalNormalisasi' => Normalisasi::count(),
                'totalNilaiAkhir' => NilaiAkhir::count(),
            ];
        });

        // Ambil daftar santri terbaik berdasarkan nilai_saw
        $santriTerbaik = NilaiAkhir::with('santri')
            ->orderByDesc('nilai_saw') // Menggunakan 'nilai_saw' yang benar
            ->take(10)
            ->get();

        // Ambil user yang sedang login
        $user = Auth::user();

        return view('admin.dashboard', array_merge($statistics, compact('user', 'santriTerbaik')));
    }
}
