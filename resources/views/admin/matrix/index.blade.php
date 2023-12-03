@extends('layouts.master')
@section('content')
@if(Session::has('success'))
<div class="pt-3">
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
</div>
@endif
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penilaian Alternatif Untuk Setiap Kriteria</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Matrix Penilaian</h6>
        </div>
        <form action="{{ url('matrix') }}" method="get"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search pt-3">
            <div class="input-group">
                <input type="search" name="katakunci" class="form-control bg-light border-0 small" placeholder="Search"
                    value="{{ Request::get('katakunci') }}" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Alternatif</th>
                            @foreach ($kriteria as $item)
                            <th class="bg-primary text-white">{{ $item->kode_kriteria }}</th>
                            @endforeach
                            <th class="bg-primary text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $item1)
                        <tr>
                            <td>{{ $item1->kode_alternatif }}</td>
                            @foreach ($kriteria as $kriteriaItem)
                            <td>
                                {{-- @foreach ($nilaic as $itemc) --}}
                                {{ $item1->matrix->where('id_kriteria', $kriteriaItem->id)->first()->C ?? '-'}}
                                {{-- @endforeach --}}
                            </td>
                            @endforeach

                            <td class="text-center d-flex justify-content-center align-items-center">
                                <a href="{{ url('matrix/'.$item1->id.'/edit') }}"
                                    class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-plus"></i>
                                </a>

                                <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" action="{{ url('matrix/'.$item1->id_alternatif) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-circle btn-sm ml-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{$data_alternatif->withQueryString()->links() }} --}}
        </div>

    </div>

</div>
@endsection