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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Subkriteria</h6>
        </div>
        <div class="card-body">
            <div class="">
                <form action="{{ url('subkriteria') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_subkriteria">Nama Sub Kriteria</label>
                            <input type="text" class="form-control" id="nama_subkriteria" placeholder="" name="nama_subkriteria" value="{{ Session::get('nama_subkriteria') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nilai_subkriteria">Nilai</label>
                            <input type="number" class="form-control" id="nilai_alternatif" placeholder="" name="nilai_subkriteria" value="{{ Session::get('nilai_subkriteria') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ url('subkriteria') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
