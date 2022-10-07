<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/material/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 03:21:56 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Performance Management system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/kecil.png">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets') }}/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('assets') }}/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets') }}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets') }}/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="/home" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets') }}/images/kecil.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets') }}/images/kecil.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="/home" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets') }}/images/kecil.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets') }}/images/bumn.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->

                    </div>


                    <div class="d-flex align-items-center">
                        <div>
                            <span class="logo-sm">
                                <img src="{{ asset('assets') }}/images/PT_PAL.png" alt="" height="100">
                            </span>
                        </div>

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>

                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('assets') }}/images/user.png" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            {{ Auth::user()->name }} </span></span>

                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                                <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></i>
                                    <span class="align-middle">Logout</span>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                            </li>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </header>
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="/home" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets') }}/images/kecil.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets') }}/images/logo-dark.png" alt="" height="17">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="/home" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets') }}/images/kecil.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets') }}/images/bumn.png" alt="" height="17">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/home" role="button" aria-expanded="false"
                            aria-controls="sidebarDashboards">
                            <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                        </a>

                    </li> <!-- end Dashboard Menu -->
                    @if(Auth::user()->status == 'administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarIcons">
                            <i class="mdi mdi-android-studio"></i> <span data-key="t-icons">RKAP PMS</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarIcons">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="{{ route('inisiatifStrategis.index') }}" class="nav-link"
                                        data-key="t-remix">inisiatifStrategis</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('KategoriPms.index') }}" class="nav-link"
                                        data-key="t-boxicons">Kategori</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('kpi_pms.index') }}" class="nav-link"
                                        data-key="t-material-design">KPI PMS</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(Auth::user()->status !== 'administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('kpi_pms.index') }}" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-android-studio"></i> <span data-key="t-apps">RKAP PMS</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->status == 'administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Tim Integrasi</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLayouts">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="{{ route('KPI_IndhanTim.index') }}" class="nav-link"
                                        data-key="t-horizontal">Tim</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('KPI_Indhan.index') }}" class="nav-link" data-key="t-detached">Tim
                                        Integrasi Indhan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(Auth::user()->status !== 'administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('KPI_Indhan.index') }}" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-apps">Tim Integrasi Indhan</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('KPI_Indiv.index') }}" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Individual Direksi</span>
                        </a>
                    </li>
                    @if(Auth::user()->status == 'administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCascading" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarCascading">
                            <i class="mdi mdi-account-circle-outline"></i> <span
                                data-key="t-authentication">Cascading</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCascading">
                            <ul class="nav nav-sm flex-column">
                                
                                <li class="nav-item">
                                    <a href="{{route('cascadeKPI.index')}}" class="nav-link" data-key="t-signin">
                                        Cascading
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('casDiv.all') }}" class="nav-link" data-key="t-signup">
                                        KPI Divisi
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(Auth::user()->status !== 'administrator')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('casDiv.all') }}" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-apps">Cascading</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="mdi mdi-puzzle-outline"></i> <span
                                data-key="t-authentication">Tupoksi</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAuth">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('KPI_TupoksiDepartemen.index') }}" class="nav-link"
                                        data-key="t-signin"> Departemen
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('KPI_TupoksiKpi.index') }}" class="nav-link" data-key="t-signup">
                                        KPI
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tupoksiProkerAll.index') }}" class="nav-link"
                                        data-key="t-signup"> Proker
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- end Dashboard Menu -->
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">KPI Divisi</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndivKPI">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                @if($users->status != 'administrator')
                                <button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>
                                    Add</button>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light ">
                                    <tr>
                                        <th scope="col">KPI</th>
                                        <th scope="col">Bobot KPI (A)</th>
                                        <th scope="col">Bobot Cascading (B)</th>
                                        <th scope="col">KPI Divisi</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">A * B</th>
                                        <th scope="col">Progress</th>
                                        @if($users->status == 'administrator')
                                        <th scope="col">Created By</th>
                                        @endif
                                        <th scope="col">Status Divisi</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($casKpi as $kpi)
                                    @foreach($casKpiDiv as $kpiDiv)
                                    @if($kpiDiv->id_CasKpi == $kpi->id)
                                    @if($users->id_divisi == $kpiDiv->created_by || $users->status == 'administrator')
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->cas_kpiName }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpi->bobot_kpi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->bobot_cascade }}%</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->kpi_divisi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->target }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kpiDiv->bkXbc }}</div>
                                            </div>
                                        </td>
                                        <td>
                                        <?php
                                            $value = 0;
                                            $tw = 0;
                                            ?>
                                            @foreach($casProk as $prok)
                                            @if($prok->id_CDiv == $kpiDiv->id)
                                            @foreach($casReal as $real)
                                            @if($real->id_CProk == $prok->id)
                                            @if($real->progress != "Belum Terisi")
                                            <?php
                                            $value += $real->progress / $prok->progress  * 25;
                                            $tw += 1;
                                            ?>
                                            @endif
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach
                                            <?php
                                            $value = round($value);
                                            ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:{{$value}}%">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="align-items-left">{{$value}}%</div>
                                                @if($tw != 0)
                                                <div class="align-items-right">TW {{$tw}}</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($kpiDiv->status_div == 1)
                                                <div class="flex-grow-1">Lead KPI</div>
                                                @elseif($kpiDiv->status_div == 0)
                                                <div class="flex-grow-1">Contribute KPI</div>
                                                @else
                                                <div class="flex-grow-1">Incorrect Value</div>
                                                @endif
                                            </div>
                                        </td>
                                        @if($users->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @foreach($divisi as $div)
                                                @if($div->id_divisi == $kpiDiv->created_by)
                                                <div class="flex-grow-1">{{ $div->div_name }}</div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal{{$kpiDiv->id}}">Edit</button>
                                                </div>
                                                <div class="details">
                                                    <a href="{{ route('cascadeProker.index', $kpiDiv->id) }}">
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn">
                                                            Proker
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="remove">
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-5-line"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr><!-- end tr -->

                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showModal{{$kpiDiv->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="post" action="{{route('casDiv.update', $kpiDiv->id)}}" enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <input name="id_CasKpi" type="text" class="form-control" id="id_CasKpi" value="{{$kpi->id}}" hidden>
                                                        <input name="bobot_kpi" type="text" class="form-control" id="bobot_kpi" value="{{$kpi->bobot_kpi}}" hidden>
                                                        <div class="mb-3">
                                                            <label for="kpi_divisi" class="form-label">KPI Divisi</label>
                                                            <input name="kpi_divisi" type="text" class="form-control" id="kpi_divisi" value="{{$kpiDiv->kpi_divisi}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="bobot_cascade" class="form-label">Bobot Cascading (Dalam %)</label>
                                                            <input name="bobot_cascade" type="text" class="form-control" id="bobot_cascade" value="{{$kpiDiv->bobot_cascade}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="target" class="form-label">Target</label>
                                                            <input name="target" type="text" class="form-control" id="target" value="{{$kpiDiv->target}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status_div" class="form-label">Status Divisi</label>
                                                            <select name="status_div" class="form-control" id="status_div">
                                                                <option value="1">Lead</option>
                                                                <option value="0">Contribute</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" id="edit-btn">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div> <!-- .card-->
            </div> <!-- .col-->
            <div class="d-flex justify-content-end">
                <div class="pagination-wrap hstack gap-2">
                    <a class="page-item pagination-prev disabled" href="#">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0"></ul>
                    <a class="page-item pagination-next" href="#">
                        Next
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- add Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="{{route('casDiv.store')}}" enctype="multipart/form-data" id="myForm"> @csrf
                        <input name="created_by" type="text" class="form-control" id="created_by" value="{{$users->id_divisi}}" readonly hidden>
                        <div class="mb-3">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="" id="kategori">
                                    <option>Choose Category</option>
                                    @foreach ($casKat as $kat)
                                    <option value="{{ $kat->id_kat }}">{{ $kat->desc_kat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('KPI') }}</label>
                            <div class="form-group mt-2 mb-2 pd-2">
                                <select name="id_CasKpi" id="kpi" class="form-control">
                                    <option value="">Select Kategori</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group mt-2 mb-2 pd-2">
                        <select name="kpi_id" id="kpi" class="form-control">
                            <option value="">Select Kategori</option>    </select>
                    </div> -->
                        <div class="mb-3">
                            <label for="kpi_divisi" class="form-label">KPI Divisi</label>
                            <input name="kpi_divisi" type="text" class="form-control" id="kpi_divisi">
                        </div>
                            <div class="mb-3">
                                <label for="bobot_cascade" class="form-label">Bobot Cascading (Dalam %)</label>
                                <input name="bobot_cascade" type="text" class="form-control" id="bobot_cascade">
                            </div>
                            <div class="mb-3">
                                <label for="target" class="form-label">Target</label>
                                <input name="target" type="text" class="form-control" id="target">
                            </div>
                            <div class="mb-3">
                                <label for="status_div" class="form-label">Status Divisi</label>
                                <select name="status_div" class="form-control" id="status_div">
                                    <option value="1">Lead</option>
                                    <option value="0">Contribute</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © PT PAL INDONESIA.
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!-- JQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori').change(function() {
                let id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                //call country on region selected
                $.ajax({
                    dataType: 'json',
                    url: "/Cascade/KPIDiv/KPI/" + id,
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $('select[name="id_CasKpi"]').empty();
                        $.each(data, function(key, data) {
                            $('select[name="id_CasKpi"]').append('<option value="' + data.id + '">' + data.cas_kpiName + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JAVASCRIPT -->
    <!-- <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('assets') }}/js/plugins.js"></script>
    
    <!-- apexcharts -->
    <script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="{{ asset('assets') }}/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets') }}/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets') }}/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- user -->
    <script src="{{ asset('assets') }}/js/pages/listjs.init.js"></script>

    <!-- Modal Js -->
    <script src="{{ asset('assets') }}/js/pages/modal.init.js"></script>


    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 03:22:46 GMT -->

</html>