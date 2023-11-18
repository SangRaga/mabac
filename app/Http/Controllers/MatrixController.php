<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\pilihan;
use Illuminate\Http\Request;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = pilihan::all();
        $alternatif = alternatif::all();
        return view('admin.matrix.index', compact('kriteria', 'alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = pilihan::all();
        return view('admin.matrix.tambah', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function simpanMatrix(Request $request)
    {
        $request->validate([
            'data_kriteria*' => 'required|numeric',
        ], [
            'data_kriteria.required*' => 'Data tidak boleh kosong',
            'data_kriteria.numeric' => 'Data hrus berupa angka'
        ]);

        // Proses penyimpanan data ke dalam database
        // ...

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
