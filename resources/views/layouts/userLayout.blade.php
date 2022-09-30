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
                                <img src="assets/images/PT_PAL.png" alt="" height="100">
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
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarIcons">
                            <i class="mdi mdi-android-studio"></i> <span data-key="t-icons">RKAP PMS</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarIcons">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->status == 'administrator')
                                <li class="nav-item">
                                    <a href="{{ route('inisiatifStrategis.index') }}" class="nav-link"
                                        data-key="t-remix">inisiatifStrategis</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('KategoriPms.index') }}" class="nav-link"
                                        data-key="t-boxicons">Kategori</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ route('kpi_pms.index') }}" class="nav-link"
                                        data-key="t-material-design">KPI PMS</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Tim Integrasi</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLayouts">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->status == 'administrator')
                                <li class="nav-item">
                                    <a href="{{ route('KPI_IndhanTim.index') }}" class="nav-link"
                                        data-key="t-horizontal">Tim</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ route('KPI_Indhan.index') }}" class="nav-link" data-key="t-detached">Tim
                                        Integrasi Indhan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('KPI_Indiv.index') }}" role="button"
                            aria-expanded="false" aria-controls="sidebarApps">
                            <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Individual Direksi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCascading" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarCascading">
                            <i class="mdi mdi-account-circle-outline"></i> <span
                                data-key="t-authentication">Cascading</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCascading">
                            <ul class="nav nav-sm flex-column">
                                @if(Auth::user()->status == 'administrator')
                                <li class="nav-item">
                                    <a href="{{route('cascadeKPI.index')}}" class="nav-link" data-key="t-signin">
                                        Cascading
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ route('casDiv.all') }}" class="nav-link" data-key="t-signup">
                                        KPI Divisi
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

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
                    <div class="col-12">
                        <!-- <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <span class="logo-sm">
                                <img src="assets/images/logo defendid.png" alt="" height="22">
                            </span> -->

                        <!-- <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div> -->

                    </div>
                </div>
            </div>
            <!-- end page title -->

            @yield('content')
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


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
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