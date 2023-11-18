@extends('layouts.master')
@section('content')
@if(Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Alternatif</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Alternatif</h6>
            <a href="{{ route('alternatif.create') }}" class="d-kode_alternatifne d-sm-inline-block btn btn-sm btn-success shadow-sm "><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
        <form action="{{ url('alternatif') }}" method="get" class="d-kode_alternatifne d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search pt-3">
            <div class="input-group">
                <input type="search" name="katakunci" class="form-control bg-light border-0 small" placeholder="Search" value="{{ Request::get('katakunci') }}"
                aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Kode</th>
                            <th class="bg-primary text-white">Nama Alternatif</th>
                            <th class="bg-primary text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?<?php $i= $data_alternatif->firstItem()?>
                           @foreach ($data_alternatif as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->kode_alternatif }}</td>
                            <td>{{ $item->nama_alternatif }}</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ url('alternatif/'.$item->kode_alternatif.'/edit') }}" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" action="{{ url('alternatif/'.$item->kode_alternatif) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-circle btn-sm ml-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                         <?php $i++ ?>
                           @endforeach
                    </tbody>
                </table>
            </div>
            {{$data_alternatif->withQueryString()->links() }}
        </div>
       
    </div>

</div>
@endsection