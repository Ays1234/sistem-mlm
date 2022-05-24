@extends('layouts.user_tampilan')
@section('dashboard')

    <body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
        <div id="preloader">
            <div class="spinner-border color-highlight" role="status"></div>
        </div>

        <div id="page">

            {{-- <div class="header header-fixed header-logo-center">
                <a href="index.html" class="header-title"></a>
                <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a> --}}
            {{-- <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a> --}}
            {{-- </div> --}}

            <div id="footer-bar" class="footer-bar-1">
                <a href="/dashboard"><i class="fa fa-home"></i><span>Home</span></a>
                <a href="/transaksi" class="active-nav"><i class="fa fa-exchange"></i><span>Transakasi</span></a>
                <a href="/akun" class="active-nav"><i class="fa fa-user"></i><span>User Akun</span></a>
            </div>

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


            <div class="page-content header-clear-medium">

                <div class="card card-style">
                    <div class="content">

                        <p>
                            Reservasi dapat dilakukan pada waktu yang sudah ditentukan, pastikan rekening akun bank anda
                            benar.
                        </p>
                    </div>
                </div>

                <div class="content mb-0" id="tab-group-listing">
                    {{-- <div class="card card-style mx-0">
                        <div class="tab-controls" data-highlight="color-highlight">
                             <a href="#" class="no-effect font-15 font-600 py-2 border-0" data-active
                                data-bs-toggle="collapse" data-bs-target="#tab-1">
                                <span class="d-block font-10 mb-n2">Tampilan</span>
                                <span class="font-20 d-block pb-2">Cards</span>
                            </a>
                         <a href="#" class="no-effect font-15 font-600 py-2 border-0" data-bs-toggle="collapse"
                                data-bs-target="#tab-2">
                                <span class="d-block font-10 mb-n2">Tampilan</span>
                                <span class="font-20 d-block pb-2">Grids</span>
                            </a>
                             <a href="#" class="no-effect font-15 font-600 py-2 border-0" data-bs-toggle="collapse"
                                data-bs-target="#tab-3">
                                <span class="d-block font-10 mb-n2">Tap to View</span>
                                <span class="font-20 d-block pb-2">Lists</span>
                            </a>
                        </div>
                    </div> --}}
                    <!-- Card Style-->
                    <div data-bs-parent="#tab-group-listing" class="collapse show" id="tab-1">

                        <div class="card card-style mx-0">

                            @foreach ($datas1 as $data1)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data1->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data1->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data1->jammasuk }} </span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                                {{ $data1->hari }} hari / {{ $data1->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data1->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data1->harga_awal }} -
                                                {{ $data1->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data1->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data1->harga_awal }}">
                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data1->harga_akhir }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data1->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data1->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data1->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                                    <input type="hidden" value="{{ $biaya1 = $data1->biaya_reservasi }}">

                                                    <input type="hidden" value="{{ $saldo1 = $data1->saldo }}">
                                                    <input type="hidden" value="{{ $biaya1 = $data1->biaya_reservasi }}">
                                                @endforeach

                                                @foreach ($assets as $asset)
                                                    <input type="show" name="harga_acak_sebelum"
                                                        value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                                @endforeach


                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data1->harga_akhir }}">

                                                <button type="submit"
                                                    class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>


                                        </div>
                                        <input type="hidden" name="harga_akhir" value="{{ $data1->harga_akhir }}">
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($datas2 as $data2)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data2->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data2->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data2->jammasuk }}</span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                                {{ $data2->hari }} hari / {{ $data2->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data2->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data2->harga_awal }} -
                                                {{ $data2->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data2->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data2->harga_awal }}">
                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data2->harga_akhir }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data2->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data2->biaya_reservasi }}">



                                                @foreach ($saldos as $saldo)
                                                    <input type="show" name="saldo"
                                                        value="{{ $saldo->saldo - $data2->biaya_reservasi }}">

                                                    <input type="show" value="{{ $saldo2 = $saldo->saldo }}">
                                                    <input type="show" value="{{ $biaya2 = $data2->biaya_reservasi }}">

                                                    @if ($saldo2 >= $biaya2)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach
                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data2->harga_akhir }}">

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($datas3 as $data3)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data3->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data3->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data3->jammasuk }} </span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                                {{ $data3->hari }} hari / {{ $data3->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data3->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data3->harga_awal }} -
                                                {{ $data3->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data3->id }}">
                                          
                                                <input type="hidden" name="harga_awal" value="{{ $data3->harga_awal }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data3->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data3->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data3->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo3 = $saldo->saldo }}">
                                                    <input type="hidden" value="{{ $biaya3 = $data3->biaya_reservasi }}">

                                                    <input type="hidden" value="{{ $saldo3 = $saldo->saldo }}">
                                                    <input type="hidden" value="{{ $biaya3 = $data3->biaya_reservasi }}">

                                                    @if ($saldo3 >= $biaya3)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach

                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data3->harga_akhir }}">

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach


                            @foreach ($datas4 as $data4)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data4->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data4->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data4->jammasuk }}</span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                                {{ $data4->hari }} hari / {{ $data4->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data4->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data4->harga_awal }} -
                                                {{ $data4->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data4->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data4->harga_awal }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data4->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data4->biaya_reservasi }}">


                                                <input type="hidden" value="{{ $biaya4 = $data4->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data4->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo4 = $saldo->saldo }}">
                                                    <input type="hidden" value="{{ $biaya4 = $data4->biaya_reservasi }}">

                                                    @if ($saldo4 >= $biaya4)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach

                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data4->harga_akhir }}">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($datas5 as $data5)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data5->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data5->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data5->jammasuk }} </span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi
                                                :
                                                {{ $data5->hari }} hari / {{ $data5->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data5->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data5->harga_awal }} -
                                                {{ $data5->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data5->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data5->harga_awal }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data5->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data5->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data5->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo5 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya5 = $data5->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo5 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya5 = $data5->biaya_reservasi }}">
                                                    @if ($saldo5 >= $biaya5)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach
                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data5->harga_akhir }}">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($datas6 as $data6)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data6->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data6->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data6->jammasuk }} </span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi
                                                :
                                                {{ $data6->hari }} hari / {{ $data6->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data6->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data6->harga_awal }} -
                                                {{ $data6->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data6->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data6->harga_awal }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data6->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data6->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data6->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo6 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya6 = $data6->biaya_reservasi }}">

                                                    <input type="hidden" value="{{ $saldo6 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya6 = $data6->biaya_reservasi }}">

                                                    @if ($saldo6 >= $biaya6)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach

                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data6->harga_akhir }}">

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($datas7 as $data7)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data7->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data7->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data7->jammasuk }} </span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi
                                                :
                                                {{ $data7->hari }} hari / {{ $data7->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data7->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data7->harga_awal }} -
                                                {{ $data7->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data7->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data7->harga_awal }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data7->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data7->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data7->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo7 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya7 = $data6->biaya_reservasi }}">

                                                    <input type="hidden" value="{{ $saldo7 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya7 = $data7->biaya_reservasi }}">

                                                    @if ($saldo7 >= $biaya7)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-700 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach

                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data7->harga_akhir }}">

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            @foreach ($datas8 as $data8)
                                <div class="card card-style bg-28 mx-2 mt-2" data-card-height="200">
                                    <img src="{{ asset('gambarreservasi/' . $data8->gambar) }}" alt=""
                                        class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">

                                    <div class="card-top p-3 pe-2 pt-2">
                                        <a href="#" data-toast="snackbar-favorites" class="float-end">
                                            <span class="bg-theme color-theme px-2 py-2 rounded-sm">
                                                <i class="fa fa-heart color-red-dark pe-1"></i>
                                                Save
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="content mt-n3">
                                    <h2>{{ $data8->nama_reservasi }}</h2>
                                    <div class="d-flex">
                                        <div>
                                            <span class="d-block color-green-dark font-500">Waktu :
                                                {{ $data8->jammasuk }} </span>
                                            <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi
                                                :
                                                {{ $data8->hari }} hari / {{ $data8->pendapatan }}%</span>
                                            <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                                {{ $data8->biaya_reservasi }}</span>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="pt-2">Rp {{ $data8->harga_awal }} -
                                                {{ $data8->harga_akhir }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="divider mt-3 mb-3"></div>
                                    <div class="d-flex">
                                        <div class="align-self-center">
                                            <h2>
                                                {{-- <span class="d-block opacity-70 font-11 mt-n2 color-theme">Reservasi/Rebut
                                                    :{{ $reservasi->batas_user }}</span> --}}
                                            </h2>
                                        </div>

                                        <div class="align-self-center ms-auto">
                                            <form action="{{ route('user.dashboard.add') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="reservasi_id" value="{{ $data8->id }}">
                                                <input type="hidden" name="harga_awal" value="{{ $data8->harga_awal }}">
                                                <input type="hidden" name="biaya_admin"
                                                    value="{{ $data8->biaya_reservasi }}">
                                                <input type="hidden" name="harga_acak"
                                                    value="{{ $data8->biaya_reservasi }}">

                                                @foreach ($saldos as $saldo)
                                                    <input type="hidden" name="saldo"
                                                        value="{{ $saldo->saldo - $data8->biaya_reservasi }}">
                                                    <input type="hidden" value="{{ $saldo8 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya8 = $data8->biaya_reservasi }}">

                                                    <input type="hidden" value="{{ $saldo8 = $saldo->saldo }}">
                                                    <input type="hidden"
                                                        value="{{ $biaya8 = $data8->biaya_reservasi }}">

                                                    @if ($saldo8 >= $biaya8)
                                                        <button type="submit"
                                                            class="btn btn-s bg-green-dark rounded-sm font-800 text-uppercase">Reservasi</button>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-s bg-green-dark rounded-sm font-800 text-uppercase"
                                                            data-toast="notification-1">Reservasi</a>
                                                    @endif
                                                @endforeach

                                                <input type="hidden" name="harga_akhir"
                                                    value="{{ $data8->harga_akhir }}">

                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>
                    <!-- List View-->

                    <div id="notification-1" data-bs-dismiss="notification-1" data-bs-delay="2000" data-bs-autohide="true"
                        class="notification notification-ios bg-dark-dark notch-push mt-3">
                        <span class="notification-icon">
                            <i class="fa fa-bell"></i>
                            <em>Saldo anda habis</em>
                            <i data-bs-dismiss="notification-1" class="fa fa-times-circle"></i>
                        </span>
                        <p class="pt-2">
                            Anda Tidak dapat Reservasi, Silakan isi saldo anda !!!
                        </p>
                    </div>

                    <div data-bs-parent="#tab-group-listing" class="collapse" id="tab-2">
                        @foreach ($reservasis as $reservasi)
                            <div class="card card-style mx-0">
                                <div class="content">
                                    <div class="d-flex mb-3">
                                        <div class="w-100 me-3">
                                            <div class="card card-style m-0 bg-21" data-card-height="140">
                                                <div class="card-bottom text-center pb-3">
                                                    <a href="#" data-toast="snackbar-favorites"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-heart color-red-dark font-12"></i></a>
                                                    <a href="#" data-toast="snackbar-cart"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-shopping-bag font-12"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-100">
                                            <h5 class="font-600 font-16 line-height-sm">
                                                {{ $reservasi->nama_reservasi }}
                                            </h5>
                                            <span class="color-green-dark d-block font-11 font-600">In Stock</span>
                                            <h2 class="pt-2 mt-n1">$2499.<sup
                                                    class="font-14 font-400 opacity-50">99</sup>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="divider mt-4 mb-4"></div>
                                    <div class="d-flex mb-3">
                                        <div class="w-100 me-3">
                                            <div class="card card-style m-0 bg-8" data-card-height="150">
                                                <div class="card-bottom text-center pb-3">
                                                    <a href="#" data-toast="snackbar-favorites"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-heart color-red-dark font-12"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-100">
                                            <span class="color-red-dark d-block font-11 font-600">Out of Stock</span>
                                            <h2 class="opacity-40 pb-2 mt-n1">$999.<sup
                                                    class="font-14 font-400 opacity-50">99</sup>
                                            </h2>
                                            <h5 class="opacity-40 font-600 font-16 line-height-sm">Macbook Air, 1TB Fushion
                                                Drive, 16GB DDR4, Apple Chip M9X</h5>
                                        </div>
                                    </div>
                                    <div class="divider mt-4 mb-4"></div>
                                    <div class="d-flex mb-3">
                                        <div class="w-100 me-3">
                                            <div class="card card-style m-0 bg-28" data-card-height="140">
                                                <div class="card-top p-2">
                                                    <span
                                                        class="bg-red-dark p-2 py-1 rounded-sm font-13 font-600">-50%</span>
                                                </div>
                                                <div class="card-bottom text-center pb-3">
                                                    <a href="#" data-toast="snackbar-favorites"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-heart color-red-dark font-12"></i></a>
                                                    <a href="#" data-toast="snackbar-cart"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-shopping-bag font-12"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-100">
                                            <span class="color-red-dark d-block font-11 font-600">Out of Stock</span>
                                            <h2 class="pb-3 mt-n1">$999.<sup
                                                    class="font-14 font-400 opacity-50">99</sup>
                                            </h2>
                                            <h5 class="font-600 font-16 line-height-sm">Macbook Air, 256GB SSD, 16GB DDR4,
                                                Apple Chip M5X</h5>
                                        </div>
                                    </div>
                                    <div class="divider mt-4 mb-4"></div>
                                    <div class="d-flex mb-3">
                                        <div class="w-100 me-3">
                                            <div class="card card-style m-0 bg-30" data-card-height="140">
                                                <div class="card-top p-2">
                                                    <span
                                                        class="bg-green-dark p-2 py-1 rounded-sm font-13 font-600">-50%</span>
                                                </div>
                                                <div class="card-bottom text-center pb-3">
                                                    <a href="#" data-toast="snackbar-favorites"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-heart color-red-dark font-12"></i></a>
                                                    <a href="#" data-toast="snackbar-cart"
                                                        class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                            class="fa fa-shopping-bag font-12"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-100">
                                            <span class="color-blue-dark d-block font-11 font-600">Featured this
                                                Week</span>
                                            <h2 class="pb-3 mt-n1">$2999.<sup
                                                    class="font-14 font-400 opacity-50">99</sup>
                                            </h2>
                                            <h5 class="font-600 font-16 line-height-sm">Apple Watch, Ceramic Edition, White
                                                Leather Band</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- 2x2 Grid View -->
                    <div data-bs-parent="#tab-group-listing" class="collapse" id="tab-3">
                        <div class="card card-style mx-0">
                            <div class="content">
                                <div class="row mb-0">
                                    <div class="col-6">
                                        <div class="card card-style m-0 bg-30" data-card-height="140">
                                            <div class="card-top p-2">
                                                <span
                                                    class="bg-green-dark p-2 py-1 rounded-sm font-13 font-600">-50%</span>
                                            </div>
                                            <div class="card-bottom text-center pb-3">
                                                <a href="#" data-toast="snackbar-favorites"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-heart color-red-dark font-12"></i></a>
                                                <a href="#" data-toast="snackbar-cart"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-shopping-bag font-12"></i></a>
                                            </div>
                                        </div>
                                        <h5 class="font-600 font-16 line-height-sm pt-3">Apple Watch, Ceramic Edition,
                                            White Leather Band</h5>
                                        <span class="color-blue-dark d-block font-11 font-600">Featured this
                                            Week</span>
                                        <h2 class="pb-3 mt-n1">$2999.<sup class="font-14 font-400 opacity-50">99</sup>
                                        </h2>
                                    </div>
                                    <div class="col-6">
                                        <div class="card card-style m-0 bg-28" data-card-height="140">
                                            <div class="card-top p-2">
                                                <span class="bg-red-dark p-2 py-1 rounded-sm font-13 font-600">-50%</span>
                                            </div>
                                            <div class="card-bottom text-center pb-3">
                                                <a href="#" data-toast="snackbar-favorites"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-heart color-red-dark font-12"></i></a>
                                                <a href="#" data-toast="snackbar-cart"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-shopping-bag font-12"></i></a>
                                            </div>
                                        </div>
                                        <h5 class="font-600 font-16 line-height-sm pt-3">Macbook Air, 256GB SSD, 16GB
                                            DDR4,
                                            Apple Chip M5X</h5>
                                        <span class="color-red-dark d-block font-11 font-600">Out of Stock</span>
                                        <h2 class="pb-3 mt-n1">$1999.<sup class="font-14 font-400 opacity-50">99</sup>
                                        </h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="divider mt-2 mb-4"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card card-style m-0 bg-21" data-card-height="140">
                                            <div class="card-bottom text-center pb-3">
                                                <a href="#" data-toast="snackbar-favorites"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-heart color-red-dark font-12"></i></a>
                                                <a href="#" data-toast="snackbar-cart"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-shopping-bag font-12"></i></a>
                                            </div>
                                        </div>
                                        <h5 class="font-600 font-16 line-height-sm pt-3">Macbook Pro, 2TB SSD, 64GB
                                            DDR4,
                                            Apple Chip M9X</h5>
                                        <span class="color-green-dark d-block font-11 font-600">In Stock</span>
                                        <h2 class="mt-n1">$2499.<sup class="font-14 font-400 opacity-50">99</sup>
                                        </h2>
                                    </div>
                                    <div class="col-6">
                                        <div class="card card-style m-0 bg-8" data-card-height="140">
                                            <div class="card-bottom text-center pb-3">
                                                <a href="#" data-toast="snackbar-favorites"
                                                    class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i
                                                        class="fa fa-heart color-red-dark font-12"></i></a>
                                            </div>
                                        </div>
                                        <h5 class="opacity-40 font-600 font-16 line-height-sm pt-3">Macbook Air, 1TB
                                            Fushion Drive, 16GB DDR4, M9X</h5>
                                        <span class="color-red-dark d-block font-11 font-600">Out of Stock</span>
                                        <h2 class="opacity-40 pb-2 mt-n1">$999.<sup
                                                class="font-14 font-400 opacity-50">99</sup></h2>
                                    </div>
                                </div>
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
                    <p class="color-highlight">Any Element can have a Highlight Color</p><a href="#"
                        class="close-menu"><i class="fa fa-times"></i></a>
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
                        class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                        to Settings</a>
                </div>
            </div>



            <!-- Sidebar 1 -->
            <div id="menu-sidebar-left-1" class="menu menu-box-left menu-box-detached menu-sidebar" data-menu-width="310">
                <div class="sidebar-content">
                    <div class="bg-theme mx-3 rounded-m shadow-m my-3">
                        <div class="d-flex px-2 pb-2 pt-2">
                            <div class="align-self-center">
                                <a href="#"><img src="images/pictures/7s.jpg" width="40" class="rounded-sm"
                                        alt="img"></a>
                            </div>
                            <div class="ps-2 align-self-center">
                                <h5 class="ps-1 mb-1 pt-1 line-height-xs font-17">{{ auth()->user()->name }}</h5>
                                <h6 class="ps-1 mb-0 font-400 opacity-40 font-12">Saldo
                                    @foreach ($saldos as $saldo)
                                        {{ $saldo->saldo }}
                                    @endforeach
                                </h6>
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

                                            {{-- <form action="/keluar" method="post">

                                    @csrf
                                    <button type="submit" class="waves-effect waves-light">
                                        <li> <i class="ti-layout-sidebar-left"></i> Keluar </li>
                                    </button> --}}
                                            </form>
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
                                <a href="/transaksi">
                                    <i class="fa font-12 fa-home gradient-green rounded-sm color-white"></i>
                                    <span>Transaksi</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                <a href="#">
                                    <i class="fa font-12 fa-cog gradient-red rounded-sm color-white"></i>
                                    <span>Isi Saldo</span>
                                    {{-- <span class="badge bg-highlight">NEW</span> --}}
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                {{-- <a href="#">
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
                    </a> --}}
                            </div>
                        </div>
                    </div>


                </div>
                <div class="position-sticky w-100 bottom-0 end-0 pb-1">
                    <div class="card card-style mb-3">
                        <div class="content my-0 py-">
                            <div class="list-group list-custom-small list-icon-0">
                                <a href="#" data-toggle-theme data-trigger-switch="switch-dark2-mode"
                                    class="border-0">
                                    <i class="fa font-12 fa-moon gradient-yellow color-white rounded-sm"></i>
                                    <span>Dark Mode</span>
                                    <div class="custom-control ios-switch">
                                        <input data-toggle-theme type="checkbox" class="ios-input"
                                            id="switch-dark2-mode">
                                        <label class="custom-control-label" for="switch-dark2-mode"></label>
                                    </div>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
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

        </div>
    @endsection
