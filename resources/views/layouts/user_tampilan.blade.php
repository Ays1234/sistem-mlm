<!doctype html>
<html lang="en">


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 14:46:27 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{ $judul }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="/assets/manifest.json" />




    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap icons -->
    {{-- <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll" data-page="index">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="/assets/img/logo.png" alt="Logo">
                </div>
                <p class="mt-4">Hai...<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-pushcontent">
        <!-- Add overlay or fullmenu instead overlay -->
        <div class="closemenu text-muted">Tutup Menu</div>
        <div class="sidebar dark-bg">
            <!-- user information -->
            <div class="row my-3">
                <div class="col-12 ">
                    <div class="card shadow-sm bg-opac text-white border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="avatar avatar-44 rounded-15">
                                        <img src="/assets/img/user1.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="col px-0 align-self-center">
                                    <p class="mb-1">{{ auth()->user()->name }}</p>
                                </div>
                                <div class="col-auto">
                                    <form action="/keluar" method="post"><span>
                                            @csrf
                                            <button class="btn btn-44 btn-light" type="submit">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="card bg-opac text-white border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="display-4">
                                            @if ($saldos->isEmpty())
                                                0
                                            @else
                                                @foreach ($saldos as $saldo)
                                                    {{ $saldo->saldo }}
                                                @endforeach
                                            @endif
                                        </h1>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-muted">Isi Saldo</p>
                                    </div>
                                    {{-- <div class="col text-end">
                                        <p class="text-muted"><a href="addmoney.html">+ Top up</a>
                                        </p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- user emnu navigation -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/dashboard">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Dashboard</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/akun">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Akun</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">
                                    <form action="/keluar" method="post"><span>
                                            @csrf
                                            <button class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                type="submit">
                                                <i class="fa fa-sign-out"></i> Keluar
                                            </button>
                                    </form>
                                </div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar main menu ends -->




    <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <div class="logo-small">
                        <img src="/assets/img/logo.png" alt="">
                        <h5>RILVEST</h5>
                    </div>
                </div>
                {{-- <div class="col-auto">
                    <a href="notifications.html" target="_self" class="btn btn-light btn-44">
                        <i class="bi bi-bell"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div> --}}
            </div>
        </header>
        <!-- Header ends -->

        <!-- main page content -->
        <div class="main-container container">
            <!-- welcome user -->
            <div class="row mb-4">
                <div class="col-auto">
                    <div class="avatar avatar-50 shadow rounded-10">
                        <img src="/assets/img/user1.jpg" alt="">
                    </div>
                </div>
                <div class="col align-self-center ps-0">
                    <h4 class="text-color-theme"><span class="fw-normal">Hi</span>,
                        {{ auth()->user()->name }}
                    </h4>

                </div>
            </div>

            <!-- money request received -->
            {{-- <div class="row mb-4 hideonprogress">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-44 shadow-sm rounded-10">
                                        <img src="/assets/img/user3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="small mb-1"><a href="profile.html"
                                            class="fw-medium">Shelvey</a>
                                        <span class="text-muted">requested money</span>
                                    </p>
                                    <p>150 <span class="text-muted">$</span> <small class="text-muted">1 min
                                            ago</small>
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-44 btn-default shadow-sm">
                                        <i class="bi bi-arrow-up-right-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-12">
                                <div class="progress bg-none h-2 hideonprogressbar" data-target="hideonprogress">
                                    <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            @yield('dashboard')
            @yield('daftar')
            @yield('transaksi')
            @yield('profil')
            @yield('akun')
            @yield('bank')
            @yield('tampil_bank')
            @yield('saldo')
            @yield('isisaldo')

            <!-- swiper credit cards -->


            <!-- connection -->


            <!-- offers banner -->


            <!-- Dark mode switch -->

            <!-- Saving targets -->

            {{-- <div class="row mb-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="circle-small">
                                        <div id="circleprogressone"></div>
                                        <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                            <i class="bi bi-globe"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <p class="small mb-1 text-muted">USA Trip</p>
                                    <p>60<span class="small">%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="circle-small">
                                        <div id="circleprogresstwo"></div>
                                        <div class="avatar avatar-30 alert-success text-success rounded-circle">
                                            <i class="bi bi-cash-stack"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto align-self-center ps-0">
                                    <p class="small mb-1 text-muted">Car loan</p>
                                    <p>85<span class="small">%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 alert-danger text-danger rounded-circle">
                                        <i class="bi bi-house"></i>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="small text-muted mb-0">Home Loan</p>
                                            <p>3510.00 $</p>
                                        </div>
                                        <div class="col-auto text-end">
                                            <p class="small text-muted mb-0">Next EMI</p>
                                            <p class="small">1 Aug 2024</p>
                                        </div>
                                    </div>

                                    <div class="progress alert-danger h-4">
                                        <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Transactions -->



            <!-- Blogs -->
            {{-- <div class="row mb-3">
                <div class="col">
                    <h6 class="title">News and Upcomming</h6>
                </div>
                <div class="col-auto align-self-center">
                    <a href="blog.html" class="small">Read more</a>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blog-details.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="/assets/img/news.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="text-color-theme mb-1">Do share and Earn a lot</p>
                                    <p class="text-muted size-12">Get $10 instant as reward while your friend or
                                        invited member join FiMobile</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blog-details.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="/assets/img/news1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="text-color-theme mb-1">Walmart news latest picks</p>
                                    <p class="text-muted size-12">Get $10 instant as reward while your friend or
                                        invited member join FiMobile</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blog-details.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="/assets/img/news2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="text-color-theme mb-1">Do share and Help us</p>
                                    <p class="text-muted size-12">Get $10 instant as reward while your friend or
                                        invited member join FiMobile</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}

        </div>
        <!-- main page content ends -->


    </main>
    <!-- Page ends-->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Home</span>
                        </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="stats.html">
                        <span>
                            <i class="nav-icon bi bi-laptop"></i>
                            <span class="nav-text">Statistics</span>
                        </span>
                    </a>
                </li> --}}
                <li class="nav-item centerbutton">
                    <div class="nav-link">
                        <span class="theme-radial-gradient">
                            <i class="close bi bi-x"></i>
                            <img src="/assets/img/centerbutton.svg" class="nav-icon" alt="" />
                        </span>
                        <div class="nav-menu-popover justify-content-between">
                            <button type="button" class="btn btn-lg btn-icon-text"
                                onclick="window.location.replace('isisaldo.html');">
                                <i class="bi bi-credit-card size-32"></i><span>Isi Saldo</span>
                            </button>

                            <button type="button" class="btn btn-lg btn-icon-text"
                                onclick="window.location.replace('kirim.html');">
                                <i class="bi bi-arrow-up-right-circle size-32"></i><span>Kirim</span>
                            </button>
                        </div>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="rewards.html">
                        <span>
                            <i class="nav-icon bi bi-gift"></i>
                            <span class="nav-text">Rewards</span>
                        </span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/akun">
                        <span>
                            <i class="bi bi-person-square"></i>
                            <span class="nav-text">Akun</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- Footer ends-->

    <!-- PWA app install toast message -->
    {{-- <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-10">
        <div class="toast mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header">
                <img src="/assets/img/favicon32.png" class="rounded me-2" alt="...">
                <strong class="me-auto">Install PWA App</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        Click "Install" to install PWA app & experience indepedent.
                    </div>
                    <div class="col-auto align-self-center ps-0">
                        <button class="btn-default btn btn-sm" id="addtohome">Install</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Required jquery and libraries -->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    {{-- <script src="/assets/js/popper.min.js"></script> --}}
    <script src="/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="/assets/js/jquery.cookie.js"></script>

    <!-- Customized jquery file  -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="/assets/js/pwa-services.js"></script>

    <!-- Chart js script -->
    <script src="/assets/vendor/chart-js-3.3.1/chart.min.js"></script>

    <!-- Progress circle js script -->
    <script src="/assets/vendor/progressbar-js/progressbar.min.js"></script>

    <!-- swiper js script -->
    <script src="/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js"></script>

    <!-- page level custom script -->
    <script src="/assets/js/app.js"></script>

</body>


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 14:46:27 GMT -->

</html>
