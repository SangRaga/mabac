@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Sub Kriteria</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Fitur Aplikasi (C1)</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                        <tr>
                            <td>1</td>
                            <td>Lengkap</td>
                            <td>10</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sedang</td>
                            <td>5</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kurang</td>
                            <td>2</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Opsi Pembayaran (C2)</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                        <tr>
                            <td>1</td>
                            <td>Lengkap</td>
                            <td>10</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sedang</td>
                            <td>5</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kurang</td>
                            <td>2</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Rating Ulasan (C3)</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                        <tr>
                            <td>1</td>
                            <td>Baik</td>
                            <td>10</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Biasa</td>
                            <td>5</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Buruk</td>
                            <td>2</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jumlah Pengguna (C4)</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                        <tr>
                            <td>1</td>
                            <td>>1jt</td>
                            <td>10</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>>500k<=1jt</td>
                            <td>5</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><=500k</td>
                            <td>2</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kapasitas Penyimpanan (C5)</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                        <tr>
                            <td>1</td>
                            <td>Besar</td>
                            <td>1</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sedang</td>
                            <td>5</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kecil</td>
                            <td>10</td>
                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle btn-sm ml-2">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection