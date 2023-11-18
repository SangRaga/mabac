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
                <form action="{{ url('alternatif/'.$data_alternatif->kode_alternatif) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_alternatif">kode_alternatif</label>
                            <div class="col-sm-10">
                                {{ $data_alternatif->kode_alternatif }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_alternatif">Nama alternatif</label>
                            <input type="text" class="form-control" id="nama_alternatif" placeholder="" name="nama_alternatif" value="{{ $data_alternatif->nama_alternatif }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('alternatif') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
