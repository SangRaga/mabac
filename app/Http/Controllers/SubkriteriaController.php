<?php

namespace App\Http\Controllers;

use App\Models\pilihan;
use App\Models\subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        // untuk tombol search
        $katakunci = request()->katakunci;
        $jumlah_baris = 5;

        if (strlen($katakunci)) {
            $data_subkriteria = subkriteria::where('nama_subkriteria', 'like', "%$katakunci%")
                ->orWhere("nilai_subkriteria", "like", "%$katakunci%")
                ->paginate($jumlah_baris);
        } else {
            $data_subkriteria = subkriteria::orderBy('nama_subkriteria', 'asc')->paginate($jumlah_baris);
        }

        // untuk menampilkan nama kriteria
        $namakriteria = pilihan::all();

        return view('admin.subkriteria.index', compact('data_subkriteria', 'namakriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subkriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session()->flash('nama_subkriteria', $request->nama_subkriteria);
        Session()->flash('nilai_subkriteria', $request->nilai_subkriteria);
        $request->validate([
            'nama_subkriteria' => 'required',
            'nilai_subkriteria' => 'required|numeric:subkriteria,nilai_subkriteria',

        ], [
            'nama_subkriteria.required' => 'Nama wajib diisi',
            'nilai_subkriteria.required' => 'Nilai wajib diisi',
            'nilai_subkriteria.numeric' => 'Nilai wajib diisi dengan angka',

        ]);
        $data_subkriteria = [
            'nama_subkriteria' => $request->nama_subkriteria,
            'nilai_subkriteria' => $request->nilai_subkriteria,
        ];
        subkriteria::create($data_subkriteria);
        return redirect()->to('subkriteria')->with('success', 'Berhasil menambahkan data');
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
        $data_subkriteria = subkriteria::where('id', $id)->first();
        return view('admin.subkriteria.edit')->with('data_kriteria', $data_subkriteria);
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
}
