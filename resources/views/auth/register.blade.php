@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mt-1">
                <div class="card shadow-none">
                    <div class="card-header text-center fda-bg">
                        <img src="{{ asset('pcs.png') }}" class="mx-auto" width="100px" alt="">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="name"
                                        class="form-check-label text-capitalize">{{ __('Full Name') }}</label>
                                    <div class="input-group input-group-outline">
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required autocomplete="name"
                                            placeholder="your name here..." autofocus>
                                    </div>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email"
                                        class="form-check-label text-capitalize">{{ __('Email Address') }}</label>
                                    <div class="input-group input-group-outline">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required placeholder="your email here..."
                                            autocomplete="email">
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-3">
                                    <label for="password"
                                        class="form-check-label text-capitlize">{{ __('Password') }}</label>

                                    <div class="input-group input-group-outline">
                                        <input id="password" type="password" class="form-control" name="password" required
                                            autocomplete="new-password" placeholder="type here...">
                                    </div>
                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12  mb-3">
                                    <label for="password-confirm"
                                        class="form-check-label text-capitalize">{{ __('Confirm Password') }}</label>
                                    <div class="input-group input-group-outline">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="same pasword here...">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn w-100 pcs-bg">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer mt-0">
                        <div class="text-center mb-3">
                            <span class="form-check-label text-center">- - - - - - - - Or Register With- - - - - - - -
                            </span>
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
                                    Already have an account?
                                    <a href="{{ route('login') }}">
                                        <b class="pcs-color">Login.</b>
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
