@extends('layouts.user_tampilan')
@section('profil')

    <body class="theme-light" data-highlight="highlight-red" data-gradient="body-default" onload="countDown();">

        <div id="preloader">
            <div class="spinner-border color-highlight" role="status"></div>
        </div>
        <div id="page">

            {{-- <div class="header header-fixed header-logo-center">
                <a href="index.html" class="header-title">Sticky Mobile</a>
                <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
                <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
            </div> --}}

            <div id="footer-bar" class="footer-bar-1">
                <a href="index.html"><i class="fa fa-home"></i><span>Home</span></a>
                <a href="index-components.html" class="active-nav"><i class="fa fa-star"></i><span>Features</span></a>
                <a href="index-pages.html"><i class="fa fa-heart"></i><span>Pages</span></a>
                <a href="index-search.html"><i class="fa fa-search"></i><span>Search</span></a>
                <a href="#" data-menu="menu-settings"><i class="fa fa-cog"></i><span>Settings</span></a>
            </div>

            <div class="page-content header-clear-medium">

                <div class="card card-style preload-img" data-src="images/pictures/18w.jpg" data-card-height="130">
                    {{-- <div class="card-center ms-3">
                        <h1 class="color-white mb-0">Tabs</h1>
                        <p class="color-white mt-n1 mb-0">Versatile and Smart</p>
                    </div> --}}
                    <div class="card-center me-3">
                        <a href="#" data-back-button
                            class="btn btn-m float-end rounded-xl shadow-xl text-uppercase font-800 bg-highlight">Kembali</a>
                    </div>
                    <div class="card-overlay bg-black opacity-80"></div>
                </div>


                <div class="card card-style">
                    <p class="content">
                        Silakan Melakukan Pembayaran dalam waktu 3 jam.
                    </p>
                </div>


                <div class="card card-style bg-theme pb-0">
                    <div class="content" id="tab-group-2">
                        <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-blue-dark">
                            <a href="#" data-active data-bs-toggle="collapse" data-bs-target="#tab-5">TIM A</a>
                            <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-6">TIM B</a>
                            <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-7">TIM C</a>
                        </div>
                        <div class="clearfix mb-3"></div>
                        <div data-bs-parent="#tab-group-2" class="collapse show" id="tab-5">
                           
                                <p>Kode Referal : {{ $timas->ikut }}</p>
                         
                        </div>
                        <div data-bs-parent="#tab-group-2" class="collapse" id="tab-6">
                            <div class="accordion mt-2" id="accordion-2a">
                                <div class="mb-0">
                                    <button class="btn ps-0 pe-0 accordion-btn no-effect" data-bs-toggle="collapse"
                                        data-bs-target="#collapse4" aria-expanded="false">
                                        <i class="fa fa-heart color-red-dark me-2"></i>
                                        Accordion Title 1
                                        <i class="fa fa-plus font-10 accordion-icon"></i>
                                    </button>
                                    <div id="collapse4" class="collapse" data-parent="#accordion-2a">
                                        <div class="pt-1 pb-2">
                                            This is the accordion content. You can add any content you want to it. Really,
                                            anything! Add images, text, lists, captions or any element you want.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button class="btn ps-0 pe-0 accordion-btn no-effect" data-bs-toggle="collapse"
                                        data-bs-target="#collapse5" aria-expanded="false">
                                        <i class="fa fa-star color-yellow-dark me-2"></i>
                                        Accordion Title 2
                                        <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                                    </button>
                                    <div id="collapse5" class="collapse" data-parent="#accordion-2a">
                                        <div class="pt-1 pb-2">
                                            This is the accordion content. You can add any content you want to it. Really,
                                            anything! Add images, text, lists, captions or any element you want.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button class="btn ps-0 pe-0 accordion-btn no-effect" data-bs-toggle="collapse"
                                        data-bs-target="#collapse6" aria-expanded="false">
                                        <i class="fa fa-cloud color-blue-dark me-2"></i>
                                        Accordion Title 3
                                        <i class="fa fa-arrow-down font-10 accordion-icon"></i>
                                    </button>
                                    <div id="collapse6" class="collapse" data-parent="#accordion-2a">
                                        <div class="pt-1 pb-2">
                                            This is the accordion content. You can add any content you want to it. Really,
                                            anything! Add images, text, lists, captions or any element you want.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-bs-parent="#tab-group-2" class="collapse" id="tab-7">
                            <img class="img-fluid rounded-sm mt-2" src="images/pictures/28w.jpg" alt="img">
                        </div>
                    </div>
                </div>


            </div>
            <!-- End of Page Content-->
            <!-- All Menus, Action Sheets, Modals, Notifications, Toasts, Snackbars get Placed outside the <div class="page-content"> -->
            <div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
                <div class="menu-title mt-0 pt-0">
                    <h1>Settings</h1>
                    <p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i
                            class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <div class="list-group list-custom-small">
                        <a href="#" data-toggle-theme data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                            <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                            <span>Dark Mode</span>
                            <div class="custom-control scale-switch ios-switch">
                                <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark-mode">
                                <label class="custom-control-label" for="switch-dark-mode"></label>
                            </div>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="list-group list-custom-large">
                        <a data-menu="menu-highlights" href="#">
                            <i class="fa font-14 fa-tint bg-green-dark rounded-s"></i>
                            <span>Page Highlight</span>
                            <strong>16 Colors Highlights Included</strong>
                            <span class="badge bg-highlight color-white">HOT</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a data-menu="menu-backgrounds" href="#" class="border-0">
                            <i class="fa font-14 fa-cog bg-blue-dark rounded-s"></i>
                            <span>Background Color</span>
                            <strong>10 Page Gradients Included</strong>
                            <span class="badge bg-highlight color-white">NEW</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Menu Settings Highlights-->
            <!-- Transfer Menus -->

            

                        <label for="f2a" class="color-theme opacity-30 text-uppercase font-700 font-10 mt-1">Upload Bukti
                            Pembayaran</label>
                        <div class="input-style input-style-always-active validate-field no-borders no-icon">
                            <input type="file" class="form-control validate-email" id="f2a">

                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <div class="input-style input-style-always-active validate-field no-borders no-icon">
                            <input type="text" class="form-control validate-number" id="f3">
                            <label for=" f3" class="color-theme opacity-30 text-uppercase font-700 font-10 mt-1">Kode
                                Transaksi</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>
                        <a href="#"
                            class="close-menu btn btn-full btn-m bg-green-dark rounded-sm text-uppercase font-800 mb-3">Kirim
                        </a>
                    </div>

                </div>
          

        </div>


        <script>
            // Set the date we're counting down to



            var countDownDate = new Date("Sep 25, 2025 12:00:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                document.getElementById("demo").innerHTML = hours + "h " +
                    minutes + "m " + seconds + "s ";
                document.getElementById("demox").innerHTML = hours + "h " +
                    minutes + "m " + seconds + "s ";

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                    document.getElementById("demox").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    @endsection
