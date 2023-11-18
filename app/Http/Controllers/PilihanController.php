<?php

namespace App\Http\Controllers;

use App\Models\pilihan;
use Illuminate\Http\Request;

class PilihanController extends Controller
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
            $data_kriteria = pilihan::where('kode_kriteria', 'like', "%$katakunci%")
                // pencarian selain mengunakkan no
                ->orWhere("nama_kriteria", "like", "%$katakunci%")
                ->paginate($jumlah_baris);
        } else {
            $data_kriteria = pilihan::orderBy('kode_kriteria', 'asc')->paginate($jumlah_baris);
        }
        return view('admin.pilihan.index')->with('data_kriteria', $data_kriteria);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pilihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session()->flash('kode_kriteria', $request->kode_kriteria);
        Session()->flash('nama_kriteria', $request->nama_kriteria);
        Session()->flash('bobot_kriteria', $request->bobot_kriteria);
        Session()->flash('jenis_kriteria', $request->jenis_kriteria);
        $request->validate([
            'kode_kriteria' => 'required|unique:pilihan,kode_kriteria',
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required|numeric',
            'jenis_kriteria' => 'required',
        ], [
            'kode_kriteria.required' => 'Kode kriteria wajib diisi',
            'kode_kriteria.unique' => 'Kode sudah terdaftar',
            'nama_kriteria.required' => 'Nama kriteria wajib diisi',
            'bobot_kriteria.required' => 'Bobot kriteria wajib diisi',
            'bobot_kriteria.numeric' => 'Bobot wajib diisi dengan angka',
            'jenis_kriteria.required' => 'Jenis kriteria wajib diisi',
        ]);
        $data_kriteria = [
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
            'jenis_kriteria' => $request->jenis_kriteria,
        ];
        pilihan::create($data_kriteria);
        return redirect()->to('pilihan')->with('success', 'Berhasil menambahkan data');
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
        $data_kriteria = pilihan::where('kode_kriteria', $id)->first();
        return view('admin.pilihan.edit')->with('data_kriteria', $data_kriteria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'jenis_kriteria' => 'required',
        ], [
            'nama_kriteria.required' => 'Nama kriteria wajib diisi',
            'bobot_kriteria.required' => 'Bobot wajib diisi',
            'jenis_kriteria.required' => 'Jenis wajib diisi',

        ]);
        $data_kriteria = [
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
            'jenis_kriteria' => $request->jenis_kriteria,
        ];
        pilihan::where('kode_kriteria', $id)->update($data_kriteria);
        return redirect()->to('pilihan')->with('success','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pilihan::where('kode_kriteria', $id)->delete();
        return redirect()->to('pilihan')->with('success','Berhasih menghapus data');
    }
}
