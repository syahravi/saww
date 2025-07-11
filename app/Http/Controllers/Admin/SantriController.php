<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::all();
        return view('admin.santri.index', compact('santris'));
    }

    public function create()
    {
        return view('admin.santri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_santri' => 'required|string|max:255',
        ]);

        Santri::create($request->all());
        Alert::success('Berhasil', 'Santri berhasil ditambahkan!');

        return redirect()->route('admin.santri.index')->with('success', 'Santri berhasil ditambahkan.');
    }

    public function edit(Santri $santri)
    {
        return view('admin.santri.edit', compact('santri'));
    }

    public function update(Request $request, Santri $santri)
    {
        $request->validate([
            'nama_santri' => 'required|string|max:255',
        ]);

        $santri->update($request->all());
        Alert::success('Berhasil', 'Santri berhasil diperbarui!');

        return redirect()->route('admin.santri.index')->with('success', 'Santri berhasil diperbarui.');
    }

    public function destroy(Santri $santri)
    {
        $santri->delete();
        Alert::success('Berhasil', 'Santri berhasil dihapus!');

        return redirect()->route('admin.santri.index')->with('success', 'Santri berhasil dihapus.');
    }
}
