@extends('layouts.auth')

@section('content')
<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="" class="d-block">
                                                <img src="{{ asset('assets') }}/images/logo3.png" alt="" height="30%" width="40%">
                                            </a>
                                        </div>
                                        <div class="mt-auto">

                                            <div id="qoutescarouselIndicators" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner text-center text-white pb-0">
                                                    <div class="carousel-item active">
                                                        <p class="fs-5 fst-bold"><b>AKHLAK</b></p>
                                                                <p class="fs-15 fst-italic"><b>"AMANAH,
                                                                        KOMPETEN, HARMONIS, LOYAL, ADAPTIF,
                                                                        KOLABORATIF"</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="text-center mt-2">
                                            <h5 class="text-idigo">Login Page</h5><br>
                                        </div>

                                        <div class="mt-4">
                                            <form action="https://themesbrand.com/velzon/html/material/index.html">

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        name="username" value="{{ old('username') }}" required
                                                        autocomplete="username" autofocus placeholder="Username">
                                                    @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" id="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="current-password"
                                                            placeholder="Password">
                                                        
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">Remember me</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Login</button>
                                                </div>

                                            </form>
                                        </div>

                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
    @endsection