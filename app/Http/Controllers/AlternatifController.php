<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        // untuk tombol search
        $katakunci = request()->katakunci;
        $jumlah_baris = 5;
        if (strlen($katakunci)) {
            $data_alternatif = alternatif::where('kode_alternatif', 'like', "%$katakunci%")
                // pencarian selain mengunakkan kode_alternatif
                ->orWhere("nama_alternatif", "like", "%$katakunci%")
                ->paginate($jumlah_baris);
        } else {
            $data_alternatif = alternatif::orderBy('kode_alternatif', 'asc')->paginate($jumlah_baris);
        }
        return view('admin.alternatif.index')->with('data_alternatif', $data_alternatif);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session()->flash('kode_alternatif', $request->kode_alternatif);
        Session()->flash('nama_alternatif', $request->nama_alternatif);
        $request->validate([
            'kode_alternatif' => 'required|unique:alternatif,kode_alternatif',
            'nama_alternatif' => 'required',
        ], [
            'kode_alternatif.required' => 'Kode wajib diisi',
            'kode_alternatif.unique' => 'Kode sudah terdaftar',
            'nama_alternatif.required' => 'Nama Alternatif wajib diisi',

        ]);
        $data_alternatif = [
            'kode_alternatif' => $request->kode_alternatif,
            'nama_alternatif' => $request->nama_alternatif,
        ];
        alternatif::create($data_alternatif);
        return redirect()->to('alternatif')->with('success', 'Berhasil menambahkan data');
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
        $data_alternatif = alternatif::where('kode_alternatif', $id)->first();
        return view('admin.alternatif.edit')->with('data_alternatif', $data_alternatif);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ], [
            'nama_alternatif.required' => 'Nama Alternatif wajib diisi',

        ]);
        $data_alternatif = [
            'nama_alternatif' => $request->nama_alternatif,
        ];
        alternatif::where('kode_alternatif', $id)->update($data_alternatif);
        return redirect()->to('alternatif')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        alternatif::where('kode_alternatif', $id)->delete();
        return redirect()->to('alternatif')->with('success', 'Berhasih menghapus data');
    }
}
