@extends('layouts.user_tampilan')
@section('dashboard')
    <div class="row mb-4 hideonprogress">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">

                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="small mb-1">
                                <span class="text-muted">Selamat datang Pada aplikasi RILVEST, silakan isi saldo dulu
                                    sebelum memesan</span>
                            </p>

                        </div>

                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12">
                        <div class="progress bg-none h-2 hideonprogressbar" data-target="hideonprogress">
                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blogs -->
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Reservasi</h6>
        </div>
    </div>
    @foreach ($datas1 as $data1)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data1->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data1->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data1->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data1->hari }} hari / {{ $data1->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data1->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data1->harga_awal }} -
                                    {{ $data1->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data1->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data1->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data1->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data1->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data1->biaya_reservasi }}">

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


                                    <input type="hidden" name="harga_akhir" value="{{ $data1->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data1->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($datas2 as $data2)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data2->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data2->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data2->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data2->hari }} hari / {{ $data2->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data2->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data2->harga_awal }} -
                                    {{ $data2->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data2->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data2->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data2->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data2->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data2->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data2->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data2->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data2->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data2->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data2->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data2->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($datas3 as $data3)
        <div class="row">
            <div class="col-12 col-md-121 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data3->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data3->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data3->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data3->hari }} hari / {{ $data3->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data3->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data3->harga_awal }} -
                                    {{ $data3->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data3->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data3->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data3->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data3->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data3->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data3->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data3->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data3->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data3->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data3->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data3->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($datas4 as $data4)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data4->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data4->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data4->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data4->hari }} hari / {{ $data4->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data4->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data4->harga_awal }} -
                                    {{ $data4->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data4->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data4->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data4->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data4->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data4->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data4->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data4->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data4->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data4->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data4->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data4->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($datas5 as $data5)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data5->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data5->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data5->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data5->hari }} hari / {{ $data5->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data5->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data5->harga_awal }} -
                                    {{ $data5->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data5->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data5->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data5->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data5->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data5->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data5->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data5->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data5->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data5->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data5->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data5->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($datas6 as $data6)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data6->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data6->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data6->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data6->hari }} hari / {{ $data6->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data6->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data6->harga_awal }} -
                                    {{ $data6->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data6->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data6->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data6->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data6->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data6->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data6->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data6->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data6->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data6->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data6->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data6->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($datas7 as $data7)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data7->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data7->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data7->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data7->hari }} hari / {{ $data7->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data7->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data7->harga_awal }} -
                                    {{ $data7->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data7->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data7->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data7->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data7->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data7->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data7->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data7->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data7->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data7->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data7->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data7->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

    @foreach ($datas8 as $data8)
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ asset('gambarreservasi/' . $data8->gambar) }}" alt=""
                                    class="img-fluid img-thumbnail mx-auto d-block" style="max-height: 200px;">
                            </div>
                            <div class="col align-self-center">
                                <p class="text-color-theme mb-1"> {{ $data8->nama_reservasi }}</p>
                                <p class="text-muted size-12">
                                    <span class="d-block color-green-dark font-500">Waktu :
                                        {{ $data8->jammasuk }} </span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-3 opacity-60">Pendapatan Investasi :
                                        {{ $data8->hari }} hari / {{ $data8->pendapatan }}%</span>
                                </p>
                                <p class="text-muted size-12">
                                    <span class="d-block mt-n2 color-theme font-6 opacity-60">Biaya Reservasi :
                                        {{ $data8->biaya_reservasi }}</span>
                                </p>
                                <p class="text-muted size-12">
                                <h6 class="pt-2">Rp {{ $data8->harga_awal }} -
                                    {{ $data8->harga_akhir }}
                                </h6>
                                </p>
                                <p class="text-muted size-12">
                                <form action="{{ route('user.dashboard.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="reservasi_id" value="{{ $data8->id }}">
                                    <input type="hidden" name="harga_awal" value="{{ $data8->harga_awal }}">
                                    <input type="hidden" name="harga_akhir" value="{{ $data8->harga_akhir }}">
                                    <input type="hidden" name="biaya_admin" value="{{ $data8->biaya_reservasi }}">
                                    <input type="hidden" name="harga_acak" value="{{ $data8->biaya_reservasi }}">

                                    @foreach ($saldos as $saldo)
                                        <input type="hidden" name="saldo"
                                            value="{{ $saldo->saldo - $data8->biaya_reservasi }}">
                                        <input type="hidden" value="{{ $saldo1 = $saldo->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data8->biaya_reservasi }}">

                                        <input type="hidden" value="{{ $saldo1 = $data8->saldo }}">
                                        <input type="hidden" value="{{ $biaya1 = $data8->biaya_reservasi }}">
                                    @endforeach

                                    @foreach ($assets as $asset)
                                        <input type="show" name="harga_acak_sebelum"
                                            value="{{ ceil($hasil = ($asset->asset * 30) / 100) }}">
                                    @endforeach


                                    <input type="hidden" name="harga_akhir" value="{{ $data8->harga_akhir }}">

                                    <button type="submit" class="btn btn-lg btn-default w-100 mb-4 shadow">
                                        Reservasi
                                    </button>

                                    <input type="hidden" name="harga_akhir" value="{{ $data8->harga_akhir }}">
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <div class="col-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                <img src="assets/img/news1.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-1">
                                Walmart news latest picks
                            </p>
                            <p class="text-muted size-12">
                                Get $10 instant as reward while your friend or invited
                                member join FiMobile
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}

    {{-- <div class="col-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                <img src="assets/img/news2.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-1">Do share and Help us</p>
                            <p class="text-muted size-12">
                                Get $10 instant as reward while your friend or invited
                                member join FiMobile
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
    </div>
    <!-- main page content ends -->
@endsection
