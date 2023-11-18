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
                <form action="{{ url('matrix') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        @foreach ($kriteria as $item)
                        <div class="form-group col-md-6">
                            <label for="kode_alternatif">{{ $item->kode_kriteria }}</label>
                            <input type="text" class="form-control" id="kode_alternatif_{{ $item->kode_kriteria }}" placeholder="" name="data_kriteria[{{ $item->kode_kriteria }}]" value="{{ old('data_kriteria.' . $item->kode_kriteria) }}">
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{ url('matrix') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
  