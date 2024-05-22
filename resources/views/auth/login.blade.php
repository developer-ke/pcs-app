@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mt-4">
                <div class="card shadow-none">
                    <div class="card-header text-center fda-bg">
                        <img src="{{ asset('pcs.png') }}" class="mx-auto" width="100px" alt="">
                    </div>
                    <div class="card-body mb-0">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close">&times;</button>
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label for="email" class="form-check-label text-capitalize">Email address</label>
                                    <div class="input-group input-group-outline">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder='type here...'>
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="password" class="form-check-label text-capitalize">password</label>
                                    <div class="input-group input-group-outline">
                                        <input id="password" type="password" class="form-control" name="password" required
                                            autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn pcs-bg text-white w-100 mt-3">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer mt-0">
                        <div class="text-center mb-3">
                            <span class="form-check-label text-center">- - - - - - - - Or Login With- - - - - - - - </span>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('auth.redirect', ['provider' => 'google']) }}"
                                    class="img rounded-circle p-2 bg-danger" data-bs-toggle='tooltip' title="Google">
                                    <span class="fa fa-google"></span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('auth.redirect', ['provider' => 'facebook']) }}"
                                    class="img rounded-circle p-2 bg-info" data-bs-toggle='tooltip' title="Facebook">
                                    <span class="fa fa-facebook"></span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('auth.redirect', ['provider' => 'twitter']) }}"
                                    class="img rounded-circle p-2 bg-dark" data-bs-toggle='tooltip' title="Twitter">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('auth.redirect', ['provider' => 'github']) }}"
                                    class="img rounded-circle p-2  bg-secondary" data-bs-toggle='tooltip' title="Github">
                                    <span class="fa fa-github"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="text-center">
                                <p class="form-check-label">
                                    Forgot password?
                                    <a href="{{ route('password.request') }}">
                                        <b class="pcs-color">Reset.</b>
                                    </a>
                                    <br>
                                    Don't have an account?
                                    <a href="{{ route('register') }}">
                                        <b class="pcs-color">Register.</b>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
