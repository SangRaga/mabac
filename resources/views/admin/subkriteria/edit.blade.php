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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="">
                <form action="{{ url('subkriteria/'.$data_subkriteria->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama_alternatif">Nama Subkriteria</label>
                            <input type="text" class="form-control" id="nama_alternatif" placeholder="" name="nama_subkriteria" value="{{ $data_subkriteria->nama_subkriteria }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_alternatif">Nilai Subkriteria</label>
                            <input type="text" class="form-control" id="nama_alternatif" placeholder="" name="nilai_subkriteria" value="{{ $data_subkriteria->nilai_subkriteria }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('subkriteria') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
