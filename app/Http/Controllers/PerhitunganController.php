<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\matrix;
use App\Models\pilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use LengthException;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $alternatiflist = alternatif::all();
        $kriterialist = pilihan::all();
        $matrixlist = matrix::all();


        $groupedMatrix = collect($matrixlist)->groupBy('id_kriteria');
        // nilai max dan min
        $maxMin = [];
        foreach ($groupedMatrix as $idKriteria => $matrixItems) {
            // Menggunakan koleksi Laravel untuk mendapatkan nilai maksimum dan minimum
            $maxValue = collect($matrixItems)->max('C');
            $minValue = collect($matrixItems)->min('C');

            // Menyimpan hasil ke dalam array
            $maxMin[$idKriteria] = [
                'max' => $maxValue,
                'min' => $minValue,
            ];
        }


        // method normalisasi
        // Melakukan operasi antara tabel matrix dan variabel maxMin
        $normalisasi = [];
        foreach ($matrixlist as $matrixItem) {
            $idKriteria = $matrixItem['id_kriteria'];



            // Menentukan apakah tipe kriteria cost atau benefit
            $jeniskriteria = collect($kriterialist)->where('id', $idKriteria)->first()['jenis_kriteria'];

            // Menambahkan nilai max dari variabel maxMin jika tipe kriteria adalah cost
            // atau mengurangkan nilai max jika tipe kriteria adalah benefit
            $maxValue = $maxMin[$idKriteria]['max'];
            $minValue = $maxMin[$idKriteria]['min'];

            if ($jeniskriteria == 'Cost') {
                $normalisasi[] = [
                    'id' => $matrixItem['id'],
                    'id_alternatif' => $matrixItem['id_alternatif'],
                    'id_kriteria' => $matrixItem['id_kriteria'],
                    'C' => number_format(($matrixItem['C'] - $maxValue) / ($minValue - $maxValue), 4),
                    'created_at' => $matrixItem['created_at'],
                    'updated_at' => $matrixItem['updated_at'],
                ];
            } elseif ($jeniskriteria == 'Benefit') {
                $normalisasi[] = [
                    'id' => $matrixItem['id'],
                    'id_alternatif' => $matrixItem['id_alternatif'],
                    'id_kriteria' => $matrixItem['id_kriteria'],
                    'C' => number_format(($matrixItem['C'] - $minValue) / ($maxValue - $minValue), 4),
                    'created_at' => $matrixItem['created_at'],
                    'updated_at' => $matrixItem['updated_at'],
                ];
            }
        }

        $matrixsV = [];
        foreach ($normalisasi as $perhitunganV) {

            $idKriteria = $perhitunganV['id_kriteria'];
            $bobotkriteria = collect($kriterialist)->where('id', $idKriteria)->first()['bobot_kriteria'];
            $matrixsV[] = [
                'id' => $perhitunganV['id'],
                'id_alternatif' => $perhitunganV['id_alternatif'],
                'id_kriteria' => $perhitunganV['id_kriteria'],
                'C' => number_format((($perhitunganV['C'] * $bobotkriteria) + $bobotkriteria), 4),
                'created_at' => $perhitunganV['created_at'],
                'updated_at' => $perhitunganV['updated_at'],
            ];
        }




        $matrixsG = [];
        // $panjang = 1 / count($alternatiflist);
        $panjang = count($alternatiflist) > 0 ? 1 / count($alternatiflist) : 0;
        // dd($panjang);

        foreach ($matrixsV as $perhitunganG) {
            $idKriteria = $perhitunganG['id_kriteria'];

            //buatkan saya perulangan untuk menentukan total perkalian di etiap indexnya berdasarkan $idkriteria
            $totalPerkalian = 1; // Inisialisasi nilai total perkalian di luar perulangan

            foreach ($matrixsV as $item) {
                if ($item['id_kriteria'] == $idKriteria) {
                    $totalPerkalian *= $item['C'];
                }
            }
            $totalPerKriteria[$idKriteria] = $totalPerkalian;


            $matrixsG[] = [
                'id' => $perhitunganG['id'],
                'id_alternatif' => $perhitunganG['id_alternatif'],
                'id_kriteria' => $perhitunganG['id_kriteria'],
                'C' => number_format(pow($totalPerkalian, $panjang),4),
                'created_at' => $perhitunganG['created_at'],
                'updated_at' => $perhitunganG['updated_at'],
            ];
        }


        // $outputV = [];
        // foreach ($matrixsV as $keyV => $valueV) {
        //     $outputV[$keyV] = $valueV['C'];
        // }


        $matrixsQ = [];
        foreach ($matrixsV as $perhitunganQ) {
            $idKriteria = $perhitunganQ['id_kriteria'];
            $nilaiG = collect($matrixsG)->where('id_kriteria', $idKriteria)->first()['C'];

            $matrixsQ[] = [
                'id' => $perhitunganQ['id'],
                'id_alternatif' => $perhitunganQ['id_alternatif'],
                'id_kriteria' => $perhitunganQ['id_kriteria'],
                'C' => number_format(($perhitunganQ['C'] - $nilaiG),4),
                'created_at' => $perhitunganQ['created_at'],
                'updated_at' => $perhitunganQ['updated_at'],
            ];
        }
        // dd($matrixsQ);

        function sumByIdAlternatif($matrixsQ, $idAlternatif)
        {
            $total = 0;

            foreach ($matrixsQ as $item) {
                if ($item['id_alternatif'] == $idAlternatif) {
                    $total += $item['C'];
                }
            }
            return $total;
        }

        $matrixsTambah = [];
        foreach ($matrixsQ as $perhitunganTambah) {
            $idAlternatif = $perhitunganTambah['id_alternatif'];
            
            $sumAlternatif = sumByIdAlternatif($matrixsQ, $idAlternatif);
            // dd($sumAlternatif);


            $matrixsTambah[] = [
                'id' => $perhitunganTambah['id'],
                'id_alternatif' => $perhitunganTambah['id_alternatif'],
                'id_kriteria' => $perhitunganTambah['id_kriteria'],
                'C' => number_format(($perhitunganTambah['C'] = $sumAlternatif),3),
                'created_at' => $perhitunganTambah['created_at'],
                'updated_at' => $perhitunganTambah['updated_at'],
            ];

            
        }
        usort($matrixsTambah, function($a, $b) {
            // Mengurutkan berdasarkan nilai 'C' secara descending
            return $b['C'] - $a['C'];
        });
        // dd($matrixsTambah);
        
        // $matrixsTambah = [];
        // foreach ($matrixsQ as $perhitunganTambah) {
        //     $idAlternatif = $perhitunganTambah['id_alternatif'];
        //     $jeniskriteria = collect($matrixsQ)->where('id_alternatif', $idAlternatif)->sum('C');

        //     $matrixsTambah[] = [
        //         'id' => $perhitunganQ['id'],
        //         'id_alternatif' => $perhitunganQ['id_alternatif'],
        //         'id_kriteria' => $perhitunganQ['id_kriteria'],
        //         'C' => $jeniskriteria,
        //         'created_at' => $perhitunganQ['created_at'],
        //         'updated_at' => $perhitunganQ['updated_at'],
        //     ];
        // }
        // dd($matrixsTambah);
       



        // return view('admin.perhitungan.index', compact('kriterialist', 'alternatiflist', 'matrixlist'))
        //     ->with('maxMin', $maxMin)
        //     ->with('normalisasi', $normalisasi)
        //     ->with('matrixsV', $matrixsV)
        //     ->with('matrixsG', $matrixsG)
        //     ->with('matrixsQ', $matrixsQ)
        //     ->with('matrixsTambah', $matrixsTambah);  

        // return view('admin.hasilakhir.index');`
        return compact('kriterialist', 'alternatiflist', 'matrixlist', 'maxMin', 'normalisasi', 'matrixsV', 'matrixsG', 'matrixsQ', 'matrixsTambah');

    }
    public function adminView()
    {
        $data = $this->index();
        $kriterialist = $data['kriterialist'];
        $alternatiflist = $data['alternatiflist'];
        $matrixlist = $data['matrixlist'];
        $maxMin = $data['maxMin'];
        $normalisasi = $data['normalisasi'];
        $matrixsV = $data['matrixsV'];
        $matrixsG = $data['matrixsG'];
        $matrixsQ = $data['matrixsQ'];
        $matrixsTambah = $data['matrixsTambah'];
      
        return view('admin.perhitungan.index', compact('kriterialist', 'alternatiflist', 'matrixlist', 'maxMin', 'normalisasi', 'matrixsV', 'matrixsG', 'matrixsQ', 'matrixsTambah'));
    }
    public function adminHasil()
    {
        $data = $this->index();
        $alternatiflist = $data['alternatiflist'];
        $kriterialist = $data['kriterialist'];
        $matrixsTambah = $data['matrixsTambah'];

      
        return view('admin.hasilakhir.index', compact('matrixsTambah', 'alternatiflist', 'kriterialist'));
    }


}
