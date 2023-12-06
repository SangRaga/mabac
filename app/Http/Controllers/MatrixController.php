<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\matrix;
use App\Models\pilihan;
use App\Models\subkriteria;
use Illuminate\Http\Request;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = alternatif::with('matrix')->get();
        $nilaic = matrix::all();
        $katakunci = request()->katakunci;
        $jumlah_baris = 5;
        if (strlen($katakunci)) {
            $data_matrix = matrix::where('id_alternatif', 'like', "%$katakunci%")
                // pencarian selain mengunakkan kode_alternatif
                ->orWhere("id_kriteria", "like", "%$katakunci%")
                ->paginate($jumlah_baris);
        } else {
            $data_matrix = matrix::orderBy('id_alternatif', 'asc')->paginate($jumlah_baris);
        }
        // dd($nilaic);
        $kriteria = pilihan::all();
        return view('admin.matrix.index', compact('kriteria', 'alternatif', 'nilaic'))
            ->with('dataMatrix', $data_matrix);
    }


    public function create()
    {
        $kriteria = pilihan::all();
        $alternatif = alternatif::all();
        return view('admin.matrix.tambah', compact('kriteria', 'alternatif'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $validate = matrix::get();
        $kriteria = pilihan::get();
        $alternatifs = alternatif::get();
        $request->validate([
            'C*' => 'required',
        ]);
        if ($validate) {
        }
        foreach ($alternatifs as $alternatif) {
            foreach ($kriteria as $Kriteria) {
                $nilaiAlt = new matrix;

                $nilaiAlt->id_alternatif = ($alternatif->id);
                $nilaiAlt->id_kriteria = ($Kriteria->id);
                $nilaiAlt->C = $request->get('c' . $Kriteria->kode_kriteria);
                $nilaiAlt->save();
            }
        }
        return redirect()->route('matrix.index')->with('success', 'Berhasil Menambah Nilai Alternatif!');
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
    public function edit(request $request, $id)
    {
        $data_kriteria = pilihan::all();
        $data_matrix = matrix::all();
        $data_alternatif = alternatif::where('id', $id)->first();
        $subValues = subkriteria::get();
        // dd($subValues);
        return view('admin.matrix.tambah')
            ->with('data_alternatif', $data_alternatif)
            ->with(compact('data_kriteria', 'data_matrix', 'subValues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_alternatif)
    {

        $matrixValues = $request->input('matrix_values');
        $kriteriaItems = pilihan::get();


        foreach ($kriteriaItems as $kriteriaItem) {
            $request->validate([
                "matrix_values.{$kriteriaItem->id}" => 'required',
            ], [
                "matrix_values.{$kriteriaItem->id}.required" => 'Nilai SubKriteria wajib diisi',
            ]);

            // Ambil nilai untuk kriteria saat ini
            $kriteriaValue = $matrixValues[$kriteriaItem->id];

            matrix::updateOrCreate(
                ['id_alternatif' => $id_alternatif, 'id_kriteria' => $kriteriaItem->id],
                ['C' => $kriteriaValue]
            );
        }

        return redirect()->route('matrix.index')->with('success', 'Berhasil Menambah Nilai Matrix!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        matrix::where('id_alternatif', $id)->delete();
        return redirect()->to('matrix')->with('success', 'Berhasih menghapus data');
    }
}
