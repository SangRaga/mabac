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
                <form action="{{ url('pilihan/'.$data_kriteria->kode_kriteria) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_kriteria">Kode Kriteria</label>
                            <div class="col-sm-10">
                                {{ $data_kriteria->kode_kriteria }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" placeholder="" name="nama_kriteria" value="{{ $data_kriteria->nama_kriteria }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bobot_kriteria">Bobot</label>
                            <input type="decimal" class="form-control" id="bobot_kriteria" placeholder="" name="bobot_kriteria" value="{{ $data_kriteria->bobot_kriteria }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Bobot</label>
                            <select id="inputState" class="form-control" name="jenis_kriteria">
                                <option value="Benefit" @if($data_kriteria->jenis_kriteria == 'Benefit') selected @endif>Benefit</option>
                                <option value="Cost" @if($data_kriteria->jenis_kriteria == 'Cost') selected @endif>Cost</option>
                            </select>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('pilihan') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
