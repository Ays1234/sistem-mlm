<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 14:47:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{ $judul }}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="/assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap icons -->
    {{-- <link rel="stylesheet" href="/../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- style css for this template -->
    <link href="/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signup">

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

    <!-- Begin page content -->
    <main class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto">
                            <a href="signin.html" target="_self" class="btn btn-light btn-44">
                                <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col align-self-center">
                            <h5>Daftar</h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-light btn-44 invisible"></a>
                        </div>
                    </div>
                </header>
            </div>
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                @if (session()->has('success'))
                    <div class="ms-3 me-3 alert alert-small rounded-s shadow-xl bg-green-dark" role="alert">
                        <span><i class="fa fa-check"></i></span>
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
                            aria-label="Close">&times;</button>
                    </div>
                @endif


                @if (session()->has('loginError'))
                    <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark" role="alert">
                        <span><i class="fa fa-times"></i></span>
                        <strong>{{ session('loginError') }}!</strong>
                        <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
                            aria-label="Close">&times;</button>
                    </div>
                @endif

                <form class="was-validated" action="{{ route('user.daftar') }}" method="POST">
                    @csrf
                    <div class="form-floating is-valid mb-3">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="form1a" placeholder="Email" value="{{ old('email') }}" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="emailphone">Email</label>
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="form1a" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="name">Nama Lengkap</label>
                    </div>

                    {{-- <div class="form-floating is-valid mb-3">
                        <select class="form-control" id="country">
                            <option selected>United States (+1)</option>
                            <option>United Kingdoms (+44)</option>
                        </select>
                        <label for="country">Contry</label>
                    </div> --}}
                    {{-- <div class="form-floating is-valid mb-3">
                        <input type="text" class="form-control" value="info@maxartkiller.com"
                            placeholder="Email or Phone" id="emailphone">
                        <label for="emailphone">Email or Phone</label>
                    </div> --}}
                    <div class="form-floating is-valid mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="text" name="kode_referal"
                            class="form-control @error('kode_referal') is-invalid @enderror" id="kode_referal"
                            placeholder="Kode Referal" required>
                        @error('kode_referal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="kode_referal">Kode Referal</label>
                    </div>


                    <div class="form-floating is-valid mb-3">
                        <input type="text" name="kode_transaksi"
                            class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi"
                            placeholder="Kode Referal" required>
                        @error('kode_transaksi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="kode_transaksi">Kode Transaksi</label>
                    </div>



                    <div class="form-floating is-valid mb-3">
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            id="phone" placeholder="Kode Referal" required>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="phone">Nomor Telphone</label>
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            placeholder="Alamat"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="phone">Alamat</label>
                    </div>


                    {{-- <div class="form-floating is-invalid mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password"
                            id="confirmpassword">
                        <label for="confirmpassword">Confirm Password</label>
                        <button type="button" class="btn btn-link text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Enter valid Password" id="passworderror">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div> --}}
                    {{-- <p class="mb-3"><span class="text-muted">By clicking on Signup button, you are
                            agree
                            to our</span> <a href="#">Terms and Conditions</a></p> --}}
                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                        Daftar
                    </button>
                </form>
            </div>
            <div class="col-12 text-center mt-auto">
                <div class="row justify-content-center footer-info">
                    <div class="col-auto">
                        <p class="text-muted">Or you can continue with </p>
                    </div>
                    <div class="col-auto ps-0">
                        <a href="#" class="p-1"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="p-1"><i class="bi bi-google"></i></a>
                        <a href="#" class="p-1"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Required jquery and libraries -->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="/assets/js/jquery.cookie.js"></script>

    <!-- Customized jquery file  -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="/assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="/assets/js/app.js"></script>
</body>


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 14:47:32 GMT -->

</html>
