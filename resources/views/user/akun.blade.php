@extends('layouts.user_tampilan')
@section('bank')


    <div class="page-content">



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

        <div class="content mb-2">
            <div class="row mb-0">
                <div class="col-6 pe-2">
                    <div class="card card-style mx-0 mb-3" data-card-height="170">
                        <div class="d-flex p-3">
                            <div>
                                <h1 class="mb-n2" style="color: mediumseagreen">
                                    @if ($assets->isEmpty())
                                        0
                                    @else
                                        {{ $total }}
                                    @endif
                                </h1>
                                <span class="font-11">Total Asset</span>
                            </div>
                            <div class="ms-auto align-self-center">
                                <i class="color-green-dark fa fa-angle-up font-18"></i>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="chart-container ms-n2 mb-n2" style="width:110%; height:120px;">
                                <canvas class="graph" id="incomeStats" /></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 ps-2">
                    <div class="card card-style mx-0 mb-3" data-card-height="170">
                        <div class="d-flex p-3">
                            <div>
                                <h1 class="mb-n2">
                                    @if ($saldos->isEmpty())
                                        0
                                    @else
                                        @foreach ($saldos as $saldo)
                                            {{ $saldo->saldo }}
                                        @endforeach
                                    @endif
                                </h1>
                                <span class="font-11">Biaya Admin</span>
                            </div>
                            <div class="ms-auto align-self-center">
                                <i class="color-blue-dark fa fa-minus font-18"></i>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="chart-container ms-n2 mb-n2" style="width:110%; height:120px;">
                                <canvas class="graph" id="newUserStats" /></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 pe-2">
                    <div class="card card-style mx-0 mb-3" data-card-height="170">
                        <div class="d-flex p-3">
                            <div>
                                <h1 class="mb-n2" style="color: DodgerBlue;">
                                    @if ($transaksis->isEmpty())
                                        0
                                    @else
                                        @foreach ($transaksis as $transaksi)
                                            {{ $transaksi->penghasilan }}
                                        @endforeach
                                    @endif


                                </h1>
                                <span class="font-11">Pendapatan investasi</span>
                            </div>
                            <div class="ms-auto align-self-center">
                                <i class="color-red-dark fa fa-angle-down font-18"></i>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="chart-container ms-n2 mb-n2" style="width:110%; height:120px;">
                                <canvas class="graph" id="userReachStats" /></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 ps-2">
                    <div class="card card-style mx-0 mb-3" data-card-height="170">
                        <div class="d-flex p-3">
                            <div>
                                <h1 class="mb-n2">1.361</h1>
                                <span class="font-11">Pendapatan Promosi</span>
                            </div>
                            <div class="ms-auto align-self-center">
                                <i class="color-green-dark fa fa-angle-up font-18"></i>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="chart-container ms-n2 mb-n2" style="width:110%; height:120px;">
                                <canvas class="graph" id="userInteractionStats" /></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Saving targets -->
        <div class="row mb-3">
            {{-- <div class="col">
                <h6 class="title">Saving Targets</h6>
            </div> --}}
            <div class="col-auto"></div>
        </div>
        <div class="row mb-4">
            <a href="/transaksi" class="mb-3">


                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/transaksi" class="mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="circle-small">

                                            <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                                <i class="bi bi-calendar-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center ">
                                        <p class="small mb-1 text-muted">Riwayat Pembelian</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/transaksi" class="mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="circle-small">

                                            <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                                <i class="bi bi-calendar-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center ">
                                        <p class="small mb-1 text-muted">Riwayat Transafare</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/transaksi" class="mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="circle-small">

                                            <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                                <i class="bi bi-calendar-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center ">
                                        <p class="small mb-1 text-muted">Riwayat Reservasi</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>



                <div class="col-6 col-md-4 col-lg-3">
                    <a href="/transaksi" class="mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="circle-small">

                                            <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                                <i class="bi bi-calendar-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center ">
                                        <p class="small mb-1 text-muted">Pusat Keamanan</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <a href="/bank" class="mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="circle-small">

                                            <div class="avatar avatar-30 alert-primary text-primary rounded-circle">
                                                <i class="bi bi-calendar-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center ">
                                        <p class="small mb-1 text-muted">Informasi Bank</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>

        </div>

        {{-- <div class="card card-style">
            <div class="content">
                <div class="d-flex">
                    <div class="align-self-center d-inline-flex p-2 bd-highlight">
                        <a href="/transaksi"
                            class="btn btn-xxs shadow-bg shadow-bg-xs gradient-blue color-white rounded-s font-11 text-uppercase"
                            style="font-size:11px;">
                            <p><i class="fa fa-calendar" style="font-size:48px;color:rgb(251, 247, 247)"></i></p>
                            Riwayat Pembelian
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
                    <div class="align-self-center ms-auto">
                        <a href="#"
                            class="btn btn-xxs shadow-bg shadow-bg-xs gradient-blue color-white rounded-s font-11 text-uppercase">
                            <p><i class="fas fa-briefcase" style="font-size:48px;color:rgb(251, 247, 247)"></i></p>
                            Riwayat Reservasi
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

@endsection
