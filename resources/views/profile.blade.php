@extends('layouts.userLayout')
@section('content')


<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index-2.html" class="d-inline-block auth-logo">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </a>
                        </div>
                        <!-- <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p> -->
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-lg-10 ">
                    <div>
                        <div class="team-list grid-view-filter row ">
                            <!--end col-->
                            <!-- <div class="col"> -->
                            <div class="card team-box">
                                <div class="team-cover">
                                    <img src="{{ asset('assets') }}/images/img-6.jpg" alt="" class="img-fluid" />
                                </div>
                                <div class="card-body p-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="bookmark-icon flex-shrink-0 me-2">
                                                        <input type="checkbox" id="favourite11"
                                                            class="bookmark-input bookmark-hide">
                                                        <label for="favourite11" class="btn-star">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="#icon-star" />
                                                            </svg>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle shadow flex-shrink-0">
                                                    <img src="{{ asset('assets') }}/images/user.png" alt=""
                                                        class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a data-bs-toggle="offcanvas" href="#offcanvasExample"
                                                        aria-controls="offcanvasExample">
                                                        <h2><strong>{{ Auth::user()->name }} </h2>
                                                    </a>
                                                    @foreach($divisi as $div)
                                                    @if($users->id_divisi == $div->id_divisi)
                                                    <p class="text-muted mb-0">{{$div->div_name}}</p>
                                                    @endif @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">145</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">210</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.html" class="btn btn-light view-btn">View
                                                    Profile</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div>
            </div><!-- end col -->
            <!-- </div>
        </div>
        <!-- end container -->
        </div>
        <!-- end auth page content -->


        <!-- end auth-page-wrapper -->



        @endsection