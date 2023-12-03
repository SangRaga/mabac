@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Perhitungan</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- Matrix Keputusan (X) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Keputusan (X)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Alternatif</th>
                            @foreach ($kriterialist as $item)
                            <th class="bg-primary text-white">{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($alternatiflist as $itema)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itema->nama_alternatif }}</td>
                            @foreach ($kriterialist as $itemk)
                            <td>
                                {{ $itema->matrix->where('id_kriteria', $itemk->id)->first()->C ?? '-'}}
                            </td>
                            @endforeach
                        </tr>

                        @endforeach
                        <tr>
                            <td colspan="2" class="text-center">Max</td>
                            @foreach ($kriterialist as $itemk)
                            <td>
                                {{ $maxMin[$itemk->id]['max'] ?? '-' }}
                            </td>
                            @endforeach

                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">Min</td>
                            @foreach ($kriterialist as $itemk)
                            <td>
                                {{ $maxMin[$itemk->id]['min'] ?? '-'}}
                            </td>
                            @endforeach

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Normalisasi Matriks Keputusan (N) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Normalisasi Matriks Keputusan (N)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Alternatif</th>
                            @foreach ($kriterialist as $item)
                            <th class="bg-primary text-white">{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatiflist as $itema)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itema->nama_alternatif }}</td>
                            @foreach ($kriterialist as $itemk)
                            <td>
                                {{ collect($normalisasi)
                                ->where('id_kriteria', $itemk->id)
                                ->where('id_alternatif', $itema->id)
                                ->first()['C'] ?? '-' }}
                                {{-- @php
                                dd($itema->id);
                                @endphp --}}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bobot Kriteria (W) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria (W)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            @foreach ($kriterialist as $item)
                            <th class="bg-primary text-white">{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($kriterialist as $item)
                            <td>{{ $item->bobot_kriteria }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Matriks Bobot Keputusan (V) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Bobot Keputusan (V)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Alternatif</th>
                            @foreach ($kriterialist as $item)
                            <th class="bg-primary text-white">{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatiflist as $itema)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $itema->nama_alternatif }}</td>
                            @foreach ($kriterialist as $itemk)
                            <td>
                                {{ collect($matrixsV)
                                ->where('id_kriteria', $itemk->id)
                                ->where('id_alternatif', $itema->id)
                                ->first()['C'] ?? '-' }}
                                {{-- @php
                                dd($itema->id);
                                @endphp --}}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Nilai Btas Matriks (G) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Nilai Batas Matriks (G)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Kode Kriteria</th>
                            <th class="bg-primary text-white">Nama Kriteria</th>
                            <th class="bg-primary text-white">Nilai Batas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterialist as $itemk)
                        <tr>
                            <td>{{ $itemk->kode_kriteria }}</td>
                            <td>{{ $itemk->nama_kriteria }}</td>
                            <td>
                                {{ collect($matrixsG)
                                ->where('id_kriteria', $itemk->id)
                                ->where('id_alternatif', $itema->id ?? 'null')
                                ->first()['C'] ?? '-' }}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Matriks Jarak Daerah Perkiraan Perbatasan (Q) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Jarak dari Daerah Perkiraan Perbatasan (Q)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Kode Alternatif</th>
                            <th class="bg-primary text-white">Alternatif</th>
                            @foreach ($kriterialist as $item)
                            <th class="bg-primary text-white">{{ $item->kode_kriteria }}</th>
                            @endforeach
                            <th class="bg-primary text-white">S</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatiflist as $itema)
                        <tr>
                            <td>{{ $itema->kode_alternatif }}</td>
                            <td>{{ $itema->nama_alternatif }}</td>
                            @foreach ($kriterialist as $itemk)
                            <td>
                                {{ collect($matrixsQ)
                                ->where('id_alternatif', $itema->id)
                                ->where('id_kriteria', $itemk->id)
                                ->first()['C'] ?? '-' }}
                            </td>
                            @endforeach
                            <td>
                                {{ collect($matrixsTambah)
                                    ->where('id_alternatif', $itema->id)
                                    ->where('id_kriteria', $itemk->id ?? 'null')
                                    ->first()['C'] ?? '-' }}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection