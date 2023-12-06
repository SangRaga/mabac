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
        $sublist = subkriteria::all();
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

        return view('admin.subkriteria.index', compact('data_subkriteria', 'namakriteria', 'sublist'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteriaList = pilihan::all();
        return view('admin.subkriteria.create', compact('kriteriaList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session()->flash('nama_subkriteria', $request->nama_subkriteria);
        Session()->flash('nilai_subkriteria', $request->nilai_subkriteria);
        Session()->flash('id_kriteria', $request->id_kriteria);
        $request->validate([
            'nama_subkriteria' => 'required',
            'nilai_subkriteria' => 'required|numeric',
            'id_kriteria' => 'required|exists:pilihan,id', // Pastikan id_kriteria tersedia di tabel pilihan
        ], [
            'nama_subkriteria.required' => 'Nama wajib diisi',
            'nilai_subkriteria.required' => 'Nilai wajib diisi',
            'nilai_subkriteria.numeric' => 'Nilai wajib diisi dengan angka',
            'id_kriteria.required' => 'Kode Kriteria wajib dipilih',
            'id_kriteria.exists' => 'Kode Kriteria tidak valid',
        ]);

        $data_subkriteria = [
            'nama_subkriteria' => $request->nama_subkriteria,
            'nilai_subkriteria' => $request->nilai_subkriteria,
            'id_kriteria' => $request->id_kriteria,
        ];

        Subkriteria::create($data_subkriteria);

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
        // dd($data_subkriteria);
        return view('admin.subkriteria.edit')->with('data_subkriteria', $data_subkriteria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_subkriteria' => 'required',
            'nilai_subkriteria' => 'required',

        ], [
            'nama_subkriteria.required' => 'Nama Subkriteria wajib diisi',
            'nilai_subkriteria.required' => 'Nilai Subkriteria wajib diisi',

        ]);
        $data_subkriteria = [
            'nama_subkriteria' => $request->nama_subkriteria,
            'nilai_subkriteria' => $request->nilai_subkriteria,
        ];
        subkriteria::where('id', $id)->update($data_subkriteria);
        return redirect()->to('subkriteria')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        subkriteria::where('id', $id)->delete();
        return redirect()->to('subkriteria')->with('success', 'Berhasih menghapus data');
    }
}
