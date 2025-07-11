<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::all();
        return view('admin.criteria.index', compact('criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kriteria' => 'required|string|max:255',
            'simbol' => 'nullable|string|max:10',
            'bobot' => 'required|numeric',
            'type' => 'required|in:benefit,cost',
        ]);

        Criteria::create($request->all());
        Alert::success('Berhasil', 'Criteria berhasil ditambahkan!');
        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        return view('admin.criteria.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criteria $criteria)
    {
        $request->validate([
            'kriteria' => 'required|string|max:255',
            'simbol' => 'nullable|string|max:10',
            'bobot' => 'required|numeric',
            'type' => 'required|in:benefit,cost',
        ]);

        $criteria->update($request->all());
        Alert::success('Berhasil', 'Criteria berhasil diperbarui!');

        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        Alert::success('Berhasil', 'Criteria berhasil dihapus!');
        return redirect()->route('admin.criteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
