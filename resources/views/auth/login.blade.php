@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <h2 class="mb-4">Sistem Pendukung Keputusan Metode MABAC</h2>
            
            <p>
                Sistem Pendukung Keputusan (Decision Support System, DSS) adalah suatu sistem komputer yang dirancang
                untuk membantu pengambilan keputusan dalam suatu organisasi atau lingkungan pengambilan keputusan
                tertentu. Tujuan utama dari DSS adalah memberikan dukungan dan bantuan kepada para pengambil keputusan
                dalam merumuskan, memahami, dan memecahkan masalah kompleks.
            </p>
            <p>
                Metode MABAC (Multi-Attributive Border Approximation area Comparison) adalah suatu metode pengambilan
                keputusan yang menggambarkan suatu keputusan dengan menggunakan suatu kerangka kerja multiatribut yang
                digunakan untuk memecahkan suatu permasalahan multiatribut dan multi alternatif.
            </p>
        </div>
        <div class="col-md-6">
            <div class="card mx-auto" style="max-width: 400px;">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('Login') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection