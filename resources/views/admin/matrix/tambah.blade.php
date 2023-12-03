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
            <h6 class="m-0 font-weight-bold text-primary">{{ $data_alternatif->kode_alternatif }}</h6>
        </div>
        <div class="card-body">
            <div class="">
                <form action="{{ url('matrix/'.$data_alternatif->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kode_alternatif">Kode Alternatif</label>
                            <div class="col-sm-10">
                                {{ $data_alternatif->kode_alternatif }}
                            </div>
                        </div>
                        @foreach ($data_kriteria as $item)
                        <div class="form-group col-md-6">
                            <label for="id_alternatif_{{ $data_alternatif->kode_alternatif }}">{{ $item->kode_kriteria }}</label>
                            <label for="isi_kodekriteria_{{ $item->id }}"></label>
                            <input type="number" class="form-control" step="any" name="matrix_values[{{ $item->id }}]" value="" />
                            <input type="hidden" name="id_kriteria_{{ $item->id }}" value={{ $item->id }}>
                        </div>
                        @endforeach
                        

                        {{-- Tampilkan input untuk setiap kriteria --}}
                        {{-- <input type="hidden" value="{{ $data_alternatif->id }}" name="id">
                        @foreach ($data_kriteria as $item)
                        <div class="form-group col-md-6">
                            <label for="id_alternatif_{{ $data_alternatif->kode_alternatif }}"></label>
                            <label for="isi_kodekriteria_{{ $item->id }}">{{ $item->kode_kriteria }}</label>
                            <input type="hidden" name="id_kriteria_{{ $item->id }}" value={{ $item->id }}>
                            <input type="number" step="any" name="matrix_values[{{ $item->id }}]" value="" />
                        </div>
                        @endforeach --}}
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('matrix') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection