<!doctype html>
<html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 14:47:06 GMT -->

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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
    <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signin">

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
        <div class="row h-100 overflow-auto">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto"></div>
                        <h5>RILVEST</h5>
                        <div class="col-auto"></div>
                    </div>
                </header>
            </div>

            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                <div class="row">
                    <div class="col">
                        <div class="loader-cube-wrap mx-auto">
                            <img src="/assets/img/logo.png" alt="">
                        </div>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                @if (session()->has('loginError'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('loginError') }}!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <h1 class="mb-4 text-color-theme">Silakan Masuk</h1>
                <form action="{{ route('user.login.save') }}" method="post" class="was-validated needs-validation">
                    {{ csrf_field() }}
                    <div class="form-group form-floating mb-3 is-valid">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-control-label" for="email">Email</label>
                    </div>

                    <div class="form-group form-floating is-invalid mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="Password"
                            placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-control-label" for="password">Password</label>
                        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Enter valid Password" id="passworderror">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                    {{-- <p class="mb-3 text-center">
                        <a href="forgot-password.html" class="">
                            Forgot your password?
                        </a>
                    </p> --}}

                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                        Masuk
                    </button>
                </form>
                <p class="mb-2 text-muted">Apakah kau tidak memiliki akun?</p>
                <a href="/daftar" target="_self" class="">
                    Daftar <i class="bi bi-arrow-right"></i>
                </a>

            </div>
            {{-- <div class="col-12 text-center mt-auto">
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
            </div> --}}
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


    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>

</body>


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 14:47:06 GMT -->

</html>
