@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Sub Kriteria</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    @foreach ($namakriteria as $kriteria)
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ $kriteria->kode_kriteria }} {{ $kriteria->nama_kriteria }} </h6>
            <a href="{{ route('subkriteria.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Nama Sub Kriteria</th>
                            <th class="bg-primary text-white">Nilai</th>
                            <th class="bg-primary text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data_subkriteria->where('kode_kriteria', $kriteria->kode_kriteria) as $subkriteria)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $subkriteria->nama_subkriteria }}</td>
                                <td>{{ $subkriteria->nilai_subkriteria }}</td>
                                <td class="text-center d-flex justify-content-center align-items-center">
                                    <a href="{{ url('alternatif/'.$subkriteria->no.'/edit') }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" action="{{ url('alternatif/'.$subkriteria->no) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-circle btn-sm ml-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $data_subkriteria->withQueryString()->links() }}
        </div>
    </div>
@endforeach
</div>
@endsection