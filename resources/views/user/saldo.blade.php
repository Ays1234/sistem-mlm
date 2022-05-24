@extends('layouts.user_tampilan')
@section('isisaldo')
    <div id="page">
        <div id="footer-bar" class="footer-bar-1">
            <a href="/dashboard"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="/transaksi" class="active-nav"><i class="fa fa-exchange"></i><span>Transakasi</span></a>
            <a href="/akun" class="active-nav"><i class="fa fa-user"></i><span>User Akun</span></a>
        </div>

        <div class="page-content">

            <div class="content notch-clear">
                <div class="d-flex pt-2">
                    <div class="align-self-center me-auto">
                        <strong class="text-uppercase opacity-60 font-11">Selamat datang</strong>
                        <h1 class="mt-n2 font-27">{{ auth()->user()->name }} , Saldo

                            @if ($saldos->isEmpty())
                                0
                            @else
                                @foreach ($saldos as $saldo)
                                    {{ $saldo->saldo }}
                                @endforeach
                            @endif


                        </h1>
                        <form action="/keluar" method="post"><span>
                                @csrf
                                <button class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase" type="submit">
                                    <i class="fa fa-sign-out"></i> Keluar
                                </button>
                        </form>
                        </span>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" class="d-block" data-menu="menu-sidebar-left-1"><img
                                src="images/pictures/faces/2s.png" class="img-fluid shadow-xl rounded-circle"
                                width="45"></a>
                    </div>
                </div>
            </div>

            {{-- <div class="card card-style mb-3">
                <div class="content m-0 mb-n3">
                    <div class="input-style input-style-always-active has-borders no-icon mb-n3">
                        <select id="form5" class="border-0">
                            <option value="1" disabled selected>Select Time Frame</option>
                            <option value="2" selected>Last 7 Days</option>
                            <option value="3">Last 15 Days</option>
                            <option value="4">Last 30 Days</option>
                            <option value="5">Last 3 Months</option>
                            <option value="6">Last 6 Months</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                        <i class="fa fa-check pb-1 disabled valid color-green-dark"></i>
                        <i class="fa fa-check pb-1 disabled invalid color-red-dark"></i>
                    </div>
                </div>
            </div> --}}



            <div class="card card-style">
                <div class="content">
                    <div class="d-flex">
                        <div class="align-self-center d-inline-flex p-2 bd-highlight">
                            <a href="/transaksi"
                                class="btn btn-xxs shadow-bg shadow-bg-xs gradient-blue color-white rounded-s font-11 text-uppercase"
                                style="font-size:11px;">
                                <p><i class="fa fa-calendar" style="font-size:48px;color:rgb(251, 247, 247)"></i></p>
                                Isi Saldo
                            </a>
                        </div>
                        <div class="align-self-center d-inline-flex p-2 bd-highlight">
                            <a href="#"
                                class="btn btn-xxs shadow-bg shadow-bg-xs gradient-blue color-white rounded-s font-11 text-uppercase"
                                style="font-size:11px;">
                                <p><i class="fas fa-handshake" style="font-size:48px;color:rgb(251, 247, 247)"></i></p>
                                Riwayat Transfare
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card card-style">
                <div class="content">
                    <div class="d-flex">
                        <div class="align-self-center d-inline-flex p-2 bd-highlight">

                        </div>
                        <div class="align-self-center ms-auto">

                        </div>
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
        <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Highlights</h1>
                <p class="color-highlight">Any Element can have a Highlight Color</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="highlight-changer">
                    <a href="#" data-change-highlight="blue"><i class="fa fa-circle color-blue-dark"></i><span
                            class="color-blue-light">Default</span></a>
                    <a href="#" data-change-highlight="red"><i class="fa fa-circle color-red-dark"></i><span
                            class="color-red-light">Red</span></a>
                    <a href="#" data-change-highlight="orange"><i class="fa fa-circle color-orange-dark"></i><span
                            class="color-orange-light">Orange</span></a>
                    <a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span
                            class="color-pink-dark">Pink</span></a>
                    <a href="#" data-change-highlight="magenta"><i class="fa fa-circle color-magenta-dark"></i><span
                            class="color-magenta-light">Purple</span></a>
                    <a href="#" data-change-highlight="aqua"><i class="fa fa-circle color-aqua-dark"></i><span
                            class="color-aqua-light">Aqua</span></a>
                    <a href="#" data-change-highlight="teal"><i class="fa fa-circle color-teal-dark"></i><span
                            class="color-teal-light">Teal</span></a>
                    <a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span
                            class="color-mint-light">Mint</span></a>
                    <a href="#" data-change-highlight="green"><i class="fa fa-circle color-green-light"></i><span
                            class="color-green-light">Green</span></a>
                    <a href="#" data-change-highlight="grass"><i class="fa fa-circle color-green-dark"></i><span
                            class="color-green-dark">Grass</span></a>
                    <a href="#" data-change-highlight="sunny"><i class="fa fa-circle color-yellow-light"></i><span
                            class="color-yellow-light">Sunny</span></a>
                    <a href="#" data-change-highlight="yellow"><i class="fa fa-circle color-yellow-dark"></i><span
                            class="color-yellow-light">Goldish</span></a>
                    <a href="#" data-change-highlight="brown"><i class="fa fa-circle color-brown-dark"></i><span
                            class="color-brown-light">Wood</span></a>
                    <a href="#" data-change-highlight="night"><i class="fa fa-circle color-dark-dark"></i><span
                            class="color-dark-light">Night</span></a>
                    <a href="#" data-change-highlight="dark"><i class="fa fa-circle color-dark-light"></i><span
                            class="color-dark-light">Dark</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back to
                    Settings</a>
            </div>
        </div>

        <!-- Sidebar 1 -->
        <div id="menu-sidebar-left-1" class="menu menu-box-left menu-box-detached menu-sidebar" data-menu-width="310">
            <div class="sidebar-content">
                <div class="bg-theme mx-3 rounded-m shadow-m my-3">
                    <div class="d-flex px-2 pb-2 pt-2">
                        <div class="align-self-center">
                            <a href="#"><img src="images/pictures/7s.jpg" width="40" class="rounded-sm" alt="img"></a>
                        </div>
                        <div class="ps-2 align-self-center">
                            <h5 class="ps-1 mb-1 pt-1 line-height-xs font-17">Alex Doeson</h5>
                            <h6 class="ps-1 mb-0 font-400 opacity-40 font-12">Freelance Photographer</h6>
                        </div>
                        <div class="ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="icon icon-m ps-3"><i
                                    class="fa fa-ellipsis-v font-18 color-theme"></i></a>
                            <div class="dropdown-menu bg-transparent border-0 mb-n5">
                                <div class="card card-style rounded-m shadow-xl me-1">
                                    <div class="list-group list-custom-small list-icon-0 px-3 mt-n1">
                                        <a href="#" class="mb-n2 mt-n1">
                                            <span>Your Profile</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="#" class="mb-n2">
                                            <span>Messages</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="#" class="mb-n2">
                                            <span>Settings</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="#" class="mb-n1">
                                            <span>Sign Out</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-style">
                    <div class="content my-0">
                        <h5 class="font-700 text-uppercase opacity-40 font-12 pt-2 mb-0">Navigation</h5>
                        <div class="list-group list-custom-small list-icon-0">
                            <a href="#">
                                <i class="fa font-12 fa-home gradient-green rounded-sm color-white"></i>
                                <span>Homepage</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a href="#">
                                <i class="fa font-12 fa-cog gradient-red rounded-sm color-white"></i>
                                <span>Components</span>
                                <span class="badge bg-highlight">NEW</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a href="#">
                                <i class="fa font-12 fa-file gradient-blue rounded-sm color-white"></i>
                                <span>Page Packs</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a href="#">
                                <i class="fa font-12 fa-camera gradient-yellow rounded-sm color-white"></i>
                                <span>Media</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a href="#">
                                <i class="fa font-12 fa-image gradient-teal rounded-sm color-white"></i>
                                <span>Contact</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card card-style">
                    <div class="content my-0">
                        <h5 class="font-700 text-uppercase opacity-40 font-12 pt-2 mb-0">Contacts</h5>
                        <div class="list-group list-custom-small list-icon-0">
                            <a href="#">
                                <img src="images/avatars/5s.png" class="gradient-blue rounded-sm" width="27" />
                                <span>Steve Johnson</span>
                                <span class="badge bg-highlight badge-small rounded-xl me-n1">2</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a href="#">
                                <img src="images/avatars/1s.png" class="gradient-magenta rounded-sm" width="27" />
                                <span>Anna Smith</span>
                                <span class="badge bg-highlight badge-small rounded-xl me-n1">15</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card card-style">
                    <div class="content my-0">
                        <h5 class="font-700 text-uppercase opacity-40 font-12 pt-2 mb-0">Settings</h5>
                        <div class="list-group list-custom-small list-icon-0">
                            <a href="#" data-menu="menu-highlights">
                                <i class="fa font-12 fa-droplet gradient-blue rounded-sm color-white"></i>
                                <span>Highlights</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                            <a href="#" data-menu="menu-backgrounds">
                                <i class="fa font-12 fa-paint-brush gradient-orange rounded-sm color-white"></i>
                                <span>Backgrounds</span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-sticky w-100 bottom-0 end-0 pb-1">
                <div class="card card-style mb-3">
                    <div class="content my-0 py-">
                        <div class="list-group list-custom-small list-icon-0">
                            <a href="#" data-toggle-theme data-trigger-switch="switch-dark2-mode" class="border-0">
                                <i class="fa font-12 fa-moon gradient-yellow color-white rounded-sm"></i>
                                <span>Dark Mode</span>
                                <div class="custom-control ios-switch">
                                    <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark2-mode">
                                    <label class="custom-control-label" for="switch-dark2-mode"></label>
                                </div>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Settings Backgrounds-->
        <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Backgrounds</h1>
                <p class="color-highlight">Change Page Color Behind Content Boxes</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="background-changer">
                    <a href="#" data-change-background="default"><i class="bg-theme"></i><span
                            class="color-dark-dark">Default</span></a>
                    <a href="#" data-change-background="plum"><i class="body-plum"></i><span
                            class="color-plum-dark">Plum</span></a>
                    <a href="#" data-change-background="magenta"><i class="body-magenta"></i><span
                            class="color-dark-dark">Magenta</span></a>
                    <a href="#" data-change-background="dark"><i class="body-dark"></i><span
                            class="color-dark-dark">Dark</span></a>
                    <a href="#" data-change-background="violet"><i class="body-violet"></i><span
                            class="color-violet-dark">Violet</span></a>
                    <a href="#" data-change-background="red"><i class="body-red"></i><span
                            class="color-red-dark">Red</span></a>
                    <a href="#" data-change-background="green"><i class="body-green"></i><span
                            class="color-green-dark">Green</span></a>
                    <a href="#" data-change-background="sky"><i class="body-sky"></i><span
                            class="color-sky-dark">Sky</span></a>
                    <a href="#" data-change-background="orange"><i class="body-orange"></i><span
                            class="color-orange-dark">Orange</span></a>
                    <a href="#" data-change-background="yellow"><i class="body-yellow"></i><span
                            class="color-yellow-dark">Yellow</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back to
                    Settings</a>
            </div>
        </div>

        <!-- Form Wizard Modal-->
        <div id="modal-wizard-step-1" class="menu menu-box-modal rounded-m" data-menu-width="330">
            <div class="content">
                <div class="d-flex">
                    <div>
                        <h1>Rekening Bank</h1>
                    </div>
                    {{-- <div class="ms-auto">
                        <h1 class="opacity-30">1/3</h1>
                    </div> --}}
                </div>
                <p>
                    Penerima :
                </p>

                <p>
                    Rekening bank :
                </p>

                <p>
                    Nama bank :
                </p>
                <form action="{{ route('user.akun.simpan') }}" method="POST">
                    @csrf
                    <div class="input-style has-borders has-icon mb-4">
                        <i class="fa fa-user"></i>
                        <input type="nama" class="form-control" id="form1" placeholder="Nama Pemilik">
                        <label for="form1" class="color-highlight">Nama Pemilik</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders has-icon  mb-4">
                        <i class="fa fa-user"></i>
                        <input type="nomor_rekening" class="form-control" id="form1" placeholder="Nomor Rekening">
                        <label for="form1" class="color-highlight">Nomor Rekening</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <div class="input-style has-borders no-icon">
                        <label for="form5" class="color-highlight">Jenis Bank</label>
                        <select id="form5" name="nama_rekening">
                            <option disabled selected>Pilih Bank</option>
                            <option value="Mandiri">Bank Mandiri</option>
                            <option value="BCA">Bank BCA</option>
                            <option value="BRI">Bank BRI</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                        <em></em>
                    </div>
                    <button type="submit"
                        class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Menu Share -->
        <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-n1">
                <h1>Share the Love</h1>
                <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#"
                    class="close-menu"><i class="fa fa-times"></i></a>
            </div>
            <div class="content mb-0">
                <div class="divider mb-0"></div>
                <div class="list-group list-custom-small list-icon-0">
                    <a href="auto_generated" class="shareToFacebook external-link">
                        <i class="font-18 fab fa-facebook-square color-facebook"></i>
                        <span class="font-13">Facebook</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated" class="shareToTwitter external-link">
                        <i class="font-18 fab fa-twitter-square color-twitter"></i>
                        <span class="font-13">Twitter</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated" class="shareToLinkedIn external-link">
                        <i class="font-18 fab fa-linkedin color-linkedin"></i>
                        <span class="font-13">LinkedIn</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated" class="shareToWhatsApp external-link">
                        <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                        <span class="font-13">WhatsApp</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="auto_generated" class="shareToMail external-link border-0">
                        <i class="font-18 fa fa-envelope-square color-mail"></i>
                        <span class="font-13">Email</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endsection
