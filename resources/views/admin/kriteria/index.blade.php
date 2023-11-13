@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kriteria</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kriteria</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Kode Kriteria</th>
                            <th class="bg-primary text-white">Nama Kriteria</th>
                            <th class="bg-primary text-white">Bobot</th>
                            <th class="bg-primary text-white">Jenis</th>
                            <th class="bg-primary text-white">Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot> --}}
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>C1</td>
                            <td>Fitur Aplikasi</td>
                            <td>0.5</td>
                            <td>Benefit</td>
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
                            <td>C2</td>
                            <td>Opsi Pembayaran</td>
                            <td>0.49</td>
                            <td>Benefit</td>
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
                            <td>C3</td>
                            <td>Rating Ulasan</td>
                            <td>0.36</td>
                            <td>Benefit</td>
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
                            <td>4</td>
                            <td>C4</td>
                            <td>Jumlah Pengguna</td>
                            <td>0.25</td>
                            <td>Benefit</td>
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
                            <td>5</td>
                            <td>C5</td>
                            <td>Kapasita Penyimpanan</td>
                            <td>0.09</td>
                            <td>Cost</td>
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