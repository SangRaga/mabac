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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Alternatif</th>
                            <th class="bg-primary text-white">Nilai</th>
                            <th class="bg-primary text-white">Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Traveloka</td>
                            <td>0.52352</td>
                            <td>1</td>
                            
                        </tr>

                        <tr>
                            <td>Pegipegi</td>
                            <td>0.27213</td>
                            <td>2</td>
                            
                        </tr>
                        <tr>
                            <td>Travel.com</td>
                            <td>0.07513</td>
                            <td>3</td>
                            
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection