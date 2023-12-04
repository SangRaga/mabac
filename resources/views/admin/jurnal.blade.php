@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="fas fa-download h3 mb-0 text-gray-800">Refrensi Jurnal</h1>
    </div>
    <iframe src="{{ asset('sbadmin') }}/jurnal/jurnal.pdf" width="100%" height="675px"></iframe>
</div>
@endsection