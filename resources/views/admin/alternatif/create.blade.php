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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Alternatif</h6>
        </div>
        <div class="card-body">
            <div class="">
                <form action="{{ url('alternatif') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_alternatif">Kode</label>
                            <input type="text" class="form-control" id="kode_alternatif" placeholder=""
                                name="kode_alternatif" value="{{ Session::get('kode_alternatif') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_alternatif">Nama alternatif</label>
                            <input type="text" class="form-control" id="nama_alternatif" placeholder=""
                                name="nama_alternatif" value="{{ Session::get('nama_alternatif') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ url('alternatif') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection