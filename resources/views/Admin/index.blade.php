@extends('layouts.userlayout')

@section('content')
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <?php //ubah timezone menjadi jakarta
                             date_default_timezone_set("Asia/Jakarta");
                              $jam=date('H:i'); 
                              if ($jam> '05:30' && $jam < '10:00' ) { 
                                $salam='Morning, ' ; 
                            } elseif ($jam>= '10:00' && $jam < '15:00' ) { 
                                $salam='Afternoon, ' ; 
                            } elseif ($jam < '18:00' ) { 
                                $salam='Evening, ' ; 
                            } else {
                                $salam='Night, ' ; 
                            } ?>
                            <h4 class="fs-16 mb-1">
                                <?php
                                echo 'Good ' . $salam; ?> {{ Auth::user()->name }}!
                                <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true"
                                                data-date-format="d M, Y"
                                                data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-success shadow-none"><i
                                                class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button"
                                            class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn shadow-none"><i
                                                class="ri-pulse-line"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Earnings
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                            data-target="559.25">0</span>k </h4>
                                    <a href="#" class="text-decoration-underline">View net earnings</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success rounded fs-3">
                                        <i class="bx bx-dollar-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Orders</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                            data-target="36894">0</span></h4>
                                    <a href="#" class="text-decoration-underline">View all orders</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info rounded fs-3">
                                        <i class="bx bx-shopping-bag"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Customers</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                            data-target="183.35">0</span>M </h4>
                                    <a href="#" class="text-decoration-underline">See details</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning rounded fs-3">
                                        <i class="bx bx-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> My Balance</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-muted fs-14 mb-0">
                                        +0.00 %
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                            data-target="165.89">0</span>k </h4>
                                    <a href="#" class="text-decoration-underline">Withdraw money</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-danger rounded fs-3">
                                        <i class="bx bx-wallet"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Recent Upload</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                                    <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light ">
                                        <tr>
                                            <th scope="col">Divisi ID</th>
                                            <th scope="col">KPI</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="apps-ecommerce-order-details.html"
                                                    class="fw-medium link-primary">#VZ2112</a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="{{ asset('assets') }}/images/users/avatar-1.jpg"
                                                            alt="" class="avatar-xs rounded-circle shadow" />
                                                    </div>
                                                    <div class="flex-grow-1">Alex Smith</div>
                                                </div>
                                            </td>
                                            <td>Clothes</td>
                                            <td>
                                                <span class="text-success">$109.00</span>
                                            </td>
                                            <td>Zoetic Fashion</td>
                                            <td>
                                                <span class="badge badge-soft-success">Paid</span>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 fw-medium mb-0">5.0<span
                                                        class="text-muted fs-11 ms-1">(61
                                                        votes)</span></h5>
                                            </td>
                                        </tr><!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->

    
</div>
@endsection






