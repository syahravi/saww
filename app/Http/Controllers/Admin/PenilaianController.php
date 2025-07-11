<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use App\Models\Santri;
use App\Models\Criteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    public function index()
    {
        $criteria = Criteria::all();
        $penilaian = Penilaian::with('santri')
            ->get()
            ->groupBy('santri_id'); // Mencegah duplikasi data per santri

        return view('admin.penilaian.index', compact('penilaian', 'criteria'));
    }

    public function create()
    {
        $santri = Santri::all();
        $criteria = Criteria::all();

        return view('admin.penilaian.create', compact('santri', 'criteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'nilai' => 'required|array',
        ]);

        $errors = [];

        foreach ($request->nilai as $criteria_id => $nilai) {
            // Cek apakah nilai untuk santri & kriteria ini sudah ada
            $existing = Penilaian::where('santri_id', $request->santri_id)
                ->where('criteria_id', $criteria_id)
                ->exists();

            if ($existing) {
                $errors["nilai.$criteria_id"] = "Nilai untuk kriteria ini sudah diinput.";
            }
        }

        // Jika ada error, kembalikan ke halaman create dengan pesan error
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }

        // Simpan nilai jika tidak ada error
        foreach ($request->nilai as $criteria_id => $nilai) {
            Penilaian::create([
                'santri_id' => $request->santri_id,
                'criteria_id' => $criteria_id,
                'nilai' => $nilai,
            ]);
        }
        Alert::success('Berhasil', 'penilaian berhasil ditambahkan!');
        return redirect()->route('admin.penilaian.index')->with('success', 'Penilaian berhasil ditambahkan.');
    }


    public function edit($santri_id)
    {
        $santri = Santri::findOrFail($santri_id);
        $criteria = Criteria::all();
        $penilaian = Penilaian::where('santri_id', $santri_id)->pluck('nilai', 'criteria_id');

        return view('admin.penilaian.edit', compact('santri', 'criteria', 'penilaian'));
    }

    public function update(Request $request, $santri_id)
    {
        $request->validate([
            'nilai' => 'required|array',
        ]);

        foreach ($request->nilai as $criteria_id => $nilai) {
            Penilaian::updateOrCreate(
                ['santri_id' => $santri_id, 'criteria_id' => $criteria_id],
                ['nilai' => $nilai]
            );
        }
        Alert::success('Berhasil', 'penilaian berhasil diperbarui');
        return redirect()->route('admin.penilaian.index')->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function destroy($santri_id)
    {
        Penilaian::where('santri_id', $santri_id)->delete();
        Alert::success('Berhasil', 'Penilaian berhasil dihapus.');
        return redirect()->route('admin.penilaian.index')->with('success', 'Penilaian berhasil dihapus.');
    }
}
