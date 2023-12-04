@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Hasil Akhir</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Akhir Perankingan</h6>
            <div class="d-flex flex-column">
                <a href="{{ route('downloadPDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2"><i
                        class="fas fa-download fa-sm text-white-50"></i> Download Hasil</a>
                <div class="mb-2"></div>
                <a href="{{ route('viewPDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
                        class="fas fa-eye fa-sm text-white-50"></i> Lihat Hasil</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Kode Alternatif</th>
                            <th class="bg-primary text-white">Nama Alternatif</th>
                            <th class="bg-primary text-white">Nilai</th>
                            <th class="bg-primary text-white">Ranking</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        // Membuat array untuk menyimpan total nilai 'C' untuk setiap alternatif
                        $totalAlternatifC = [];
                        @endphp

                        @foreach ($alternatiflist as $itema)
                        @php
                        $totalC = 0;

                        // Menghitung total nilai 'C' untuk setiap alternatif
                        foreach ($kriterialist as $itemk) {
                        $totalC = collect($matrixsTambah)
                        ->where('id_alternatif', $itema->id)
                        ->where('id_kriteria', $itemk->id)
                        ->first()['C'] ?? 0;
                        }

                        // Menambahkan total nilai 'C' ke dalam array
                        $totalAlternatifC[$itema->id] = $totalC;
                        @endphp
                        @endforeach

                        {{-- Mengurutkan alternatif berdasarkan total nilai 'C' --}}
                        @foreach ($alternatiflist->sortByDesc(function ($itema) use ($totalAlternatifC) {
                        return $totalAlternatifC[$itema->id] ?? 0;
                        }) as $itema)
                        <tr>
                            <td>{{ $itema->kode_alternatif }}</td>
                            <td>{{ $itema->nama_alternatif }}</td>
                            <td>
                                {{ $totalAlternatifC[$itema->id] ?? '-' }}
                            </td>
                            <td>{{ $loop->iteration }}</td>
                        </tr>
                        @endforeach

                    </tbody>


                </table>
            </div>
        </div>
    </div>

</div>
@endsection