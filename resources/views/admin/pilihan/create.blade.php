@extends('layouts.master')
@section('content')
@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item )
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="">
                <form action="{{ url('pilihan') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_kriteria">Kode alternatif</label>
                            <input type="text" class="form-control" id="kode_kriteria" placeholder="" name="kode_kriteria" value="{{ Session::get('kode_kriteria') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_kriteria">Nama kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" placeholder="" name="nama_kriteria" value="{{ Session::get('nama_kriteria') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bobot_kriteria">Bobot</label>
                            <input type="decimal" class="form-control" id="bobot_kriteria" placeholder="" name="bobot_kriteria" value="{{ Session::get('bobot_kriteria') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Bobot</label>
                            <select id="inputState" class="form-control" name="jenis_kriteria">
                              <option>Benefit</option>
                              <option>Cost</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ url('pilihan') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
