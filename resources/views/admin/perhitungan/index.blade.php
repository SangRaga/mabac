@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Perhitungan</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Keputusan (X)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" >No</th>
                            <th class="bg-primary text-white" >Alternatif</th>
                            <th class="bg-primary text-white" >C1</th>
                            <th class="bg-primary text-white" >C2</th>
                            <th class="bg-primary text-white" >C3</th>
                            <th class="bg-primary text-white" >C4</th>
                            <th class="bg-primary text-white" >C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td>1</td>
                            <td>Agoda</td>
                            <td>2</td>
                            <td>3</td>
                            <td>7</td>
                            <td>8</td>
                            <td>6</td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Airbnb</td>
                            <td>6</td>
                            <td>3</td>
                            <td>9</td>
                            <td>2</td>
                            <td>1</td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pegipegi</td>
                            <td>3</td>
                            <td>6</td>
                            <td>2</td>
                            <td>2</td>
                            <td>7</td>
                            
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">Max</td>
                            <td>6</td>
                            <td>6</td>
                            <td>9</td>
                            <td>8</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">Min</td>
                            <td>2</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                            <th class="bg-primary text-white">C1</th>
                            <th class="bg-primary text-white">C2</th>
                            <th class="bg-primary text-white">C3</th>
                            <th class="bg-primary text-white">C4</th>
                            <th class="bg-primary text-white">C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Agoda</td>
                            <td>2</td>
                            <td>3</td>
                            <td>7</td>
                            <td>8</td>
                            <td>6</td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Airbnb</td>
                            <td>6</td>
                            <td>3</td>
                            <td>9</td>
                            <td>2</td>
                            <td>1</td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pegipegi</td>
                            <td>3</td>
                            <td>6</td>
                            <td>2</td>
                            <td>2</td>
                            <td>7</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria (W)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                           
                            <th class="bg-primary text-white">C1</th>
                            <th class="bg-primary text-white">C2</th>
                            <th class="bg-primary text-white">C3</th>
                            <th class="bg-primary text-white">C4</th>
                            <th class="bg-primary text-white">C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0.2</td>
                            <td>0.3</td>
                            <td>0.7</td>
                            <td>0.8</td>
                            <td>0.6</td>
                            
                        </tr>                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Martriks Bobot Keputusan (V)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Alternatif</th>
                            <th class="bg-primary text-white">C1</th>
                            <th class="bg-primary text-white">C2</th>
                            <th class="bg-primary text-white">C3</th>
                            <th class="bg-primary text-white">C4</th>
                            <th class="bg-primary text-white">C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Agoda</td>
                            <td>0.21</td>
                            <td>0.34</td>
                            <td>0.79</td>
                            <td>0.8</td>
                            <td>0.61</td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Airbnb</td>
                            <td>0.64</td>
                            <td>0.23</td>
                            <td>0.19</td>
                            <td>0.62</td>
                            <td>0.81</td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pegipegi</td>
                            <td>0.33</td>
                            <td>0.56</td>
                            <td>0.72</td>
                            <td>0.82</td>
                            <td>0.97</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                        <tr>
                            <td>C1</td>
                            <td>Fitur Aplikasi</td>
                            <td>0.7180</td>
                            
                        </tr>
                        <tr>
                            <td>C2</td>
                            <td>Opsi Pembayaran</td>
                            <td>0.9006</td>
                            
                        </tr>
                        <tr>
                            <td>C3</td>
                            <td>Rating Ulasan</td>
                            <td>0.7898</td>
                            
                        </tr>
                        <tr>
                            <td>C4</td>
                            <td>Jumlah Pengguna</td>
                            <td>0.4532</td>
                            
                        </tr>
                        <tr>
                            <td>C5</td>
                            <td>Kapasitas Penyimpanan</td>
                            <td>0.0432</td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Jarak dari Daerah Perkiraan Perbatasan (Q)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white">Alternatif</th>
                            <th class="bg-primary text-white">C1</th>
                            <th class="bg-primary text-white">C2</th>
                            <th class="bg-primary text-white">C3</th>
                            <th class="bg-primary text-white">C4</th>
                            <th class="bg-primary text-white">C5</th>
                            <th class="bg-primary text-white">Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Agoda</td>
                            <td>0.93872</td>
                            <td>0.03723</td>
                            <td>0.62477</td>
                            <td>-0.2588</td>
                            <td>0.26976</td>
                            <td>0.64379</td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Airbnb</td>
                            <td>-0.67028</td>
                            <td>-0.3486</td>
                            <td>0.9650</td>
                            <td>0.6352</td>
                            <td>0.1736</td>
                            <td>-0.03876</td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pegipegi</td>
                            <td>0.33960</td>
                            <td>0.60742</td>
                            <td>0.29078</td>
                            <td>-0.7582</td>
                            <td>0.73869</td>
                            <td>0.09347</td>
                            
                        </tr>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection