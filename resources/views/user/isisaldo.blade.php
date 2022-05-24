@extends('layouts.user_tampilan')
@section('isisaldo')
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">



        <div id="footer-bar" class="footer-bar-1">
            <a href="/dashboard"><i class="fa fa-home"></i><span>Home</span></a>
            <a href="/transaksi" class="active-nav"><i class="fa fa-exchange"></i><span>Transakasi</span></a>
            <a href="/akun" class="active-nav"><i class="fa fa-user"></i><span>User Akun</span></a>
        </div>

        <div class="page-content header-clear-medium">
            <div class="card card-style gradient-highlight shadow-bg shadow-bg-m">
                <div class="content">
                    <div class="d-flex">
                        <div class="align-self-center">

                            <h1 class="color-white mb-2">PENGUMUMAN</h1>
                        </div>
                        <div class="ms-auto align-self-center">
                            <i class="fa fa-exclamation-triangle fa-2x color-white"></i>
                        </div>
                    </div>
                    <p class="color-white opacity-70">
                        HARAP ISI ULANG BIAYA ADMIN DI JAM 06.00 PAGI - 20.00 MALAM TERIMA
                        KASIH
                        . </p>
                    <p class="color-white opacity-70">
                        CATATAN! Biaya admin hanya digunakan untuk membayar reservasi dan biaya administrasi pembelian
                        properti
                        . </p>
                </div>
            </div>
            <div class="card card-style">
                <div class="content">
                    <h4>Akun bank</h4>
                    <p>
                        Kuantiti (Isi ulang kurang dari 50.000 akan gagal)
                    </p>

                    <p>
                        Jumlah Nominal isi ulang harus diisi dengan 3 angka special dibelakang(Contohnya : Rp 79.243, Rp
                        80.170, Rp 104.412)
                    </p>

                    <h4>Informasi Bank</h4>
                    <p>
                        Penerima : PUJA MAULINA
                    </p>

                    <p>
                        BANK MANDIRI : 1110019278528
                    </p>

                    <p><span class="badge badge-danger">H</span></p>
                    <form action="{{ route('user.simpan.saldo') }}" method="POST" class="d-inline">
                        @csrf
                        <div class="row mb-0">
                            <div class="col-12">
                                <div class="input-style has-borders no-icon validate-field mb-4">
                                    <input type="text" name="saldo" class="form-control validate-name" id="form41"
                                        placeholder="Isi saldo">
                                    <label for="form41" class="color-blue-dark">Isi Saldo</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em class="font-14 color-red-dark">*</em>
                                </div>
                            </div>

                        </div>
                        <div class="input-style has-borders no-icon validate-field mb-4">
                            <input type="text" name="no_rekening" class="form-control validate-tel" id="form42"
                                placeholder="Kode Transaksi">
                            <label for="form42" class="color-blue-dark">Kode Transaksi</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em class="font-14 color-red-dark">*</em>
                        </div>
                        <div class="row mb-0">
                            <div class="col-12">
                                <label for="form42" class="color-blue-dark">Upload Bukti</label>
                                <div class="input-style input-style-always-active validate-field no-borders no-icon">
                                    <input type="file" name="gambar" class="form-control validate-email" id="f2a">
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-m rounded-sm text-uppercase font-700 bg-blue-dark btn-full mt-3">Simpan</button>
                    </form>
                </div>
            </div>



        </div>
        <!-- End of Page Content-->

        <!--Menu Events-->


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
