@extends('layouts.user_tampilan')
@section('transaksi')
    <ul class="nav nav-pills nav-justified tabs mb-3" id="assetstabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cards" type="button"
                role="tab" aria-controls="cards" aria-selected="true">Pembelian</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="currency-tab" data-bs-toggle="tab" data-bs-target="#currency" type="button"
                role="tab" aria-controls="currency" aria-selected="false">Telah Membeli</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ulasan-tab" data-bs-toggle="tab" data-bs-target="#ulasan" type="button"
                role="tab" aria-controls="ualansan" aria-selected="false">Ulansan</button>
        </li>
    </ul>

    <div class="tab-content" id="assetstabsContent">
        <div class="tab-pane fade show active" id="cards" role="tabpanel">

            {{-- pembukaan --}}
            @foreach ($transaksis as $transaksi)
                {{ $status = $transaksi->status }}
                @if ($status == '3')
                @else
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col align-self-center">
                                            <p class="text-color-theme mb-1">Kode Reservasi :
                                                {{ $transaksi->reservasi->kode_reservasi }}</p>
                                            <p class="text-color-theme mb-1">Nama Reservasi :
                                                {{ $transaksi->reservasi->nama_reservasi }}</p>
                                            <input type="hidden" value=" {{ $status = $transaksi->status }}">

                                            <p class="text-color-theme mb-1">Nila Asli : {{ $transaksi->harga_acak }}</p>
                                            <p class="text-color-theme mb-1">Pendapatan Investasi :
                                                {{ $transaksi->reservasi->hari }} hari /
                                                {{ $transaksi->reservasi->pendapatan }}%</p>
                                            <p class="text-color-theme mb-1">Penghasilan :Rp
                                                {{ ceil($penghasilan = ceil($transaksi->harga_acak * $transaksi->reservasi->pendapatan) / 100) }}
                                            </p>

                                            <p class="text-color-theme mb-1">Waktu : {{ $transaksi->created_at }} </p>
                                            <p class="text-color-theme mb-1">Batas Waktu Transfare : <b id="demo"></b>
                                            </p>


                                            @if ($status == '1')
                                                {{-- posisi kosong --}}
                                                <div class="d-grid gap-2">
                                                    <a href="#" class="btn btn-lg btn-default w-100 mb-4 shadow"
                                                        data-toggle="modal"
                                                        data-target="#exampleModal{{ $transaksi->id }}">Membayar</a>
                                                </div>
                                            @elseif($status == '2')
                                                <div class="d-grid gap-2">
                                                    <a href="#" class="btn btn-lg btn-default w-100 mb-4 shadow">Sedang
                                                        di konfirmasi</a>
                                                </div>
                                            @else
                                            @endif
                @endif


        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach
    </div>

    <div class="tab-pane fade" id="currency" role="tabpanel" aria-labelledby="currency-tab">
        @foreach ($transaksis as $transaksi)
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">

                                <div class="col align-self-center">
{{$status=$transaksi->status; }}
                                    @if ($status == '3')
                                        <p class="text-color-theme mb-1">Kode Reservasi :
                                            {{ $transaksi->reservasi->kode_reservasi }}</p>
                                        <p class="text-color-theme mb-1">Nama Reservasi :
                                            {{ $transaksi->reservasi->nama_reservasi }}</p>
                                        <input type="show" value=" {{ $status = $transaksi->status }}">

                                        <p class="text-color-theme mb-1">Nila Asli : {{ $transaksi->harga_acak }}</p>
                                        <p class="text-color-theme mb-1">Pendapatan Investasi :
                                            {{ $transaksi->reservasi->hari }} hari /
                                            {{ $transaksi->reservasi->pendapatan }}%</p>
                                        <p class="text-color-theme mb-1">Penghasilan :Rp
                                            {{ ceil($penghasilan = ceil($transaksi->harga_acak * $transaksi->reservasi->pendapatan) / 100) }}
                                        </p>

                                        <p class="text-color-theme mb-1">Waktu : {{ $transaksi->created_at }} </p>
                                        <p class="text-color-theme mb-1">Batas Waktu Transfare : <b id="demo"></b>
                                        </p>

                                        {{-- posisi kosong --}}
                                        <form method="post" action="{{ route('pembelian.update') }}"
                                            class="form-material" enctype="multipart/form-data">
                                            @csrf
                                            <input type="show" name="reservasi_id" value="{{ $transaksi->id }}">
                                            @foreach ($assets as $asset)
                                                <input type="hidden" name="asset" value="{{ $asset->asset }}">
                                            @endforeach


                                            <button type="submit" class="btn btn-danger">Jual</button>
                                        </form>
                                    @else
                                        <p class="text-color-theme mb-1">Kode Reservasi :
                                            {{ $transaksi->reservasi->kode_reservasi }}</p>
                                        <p class="text-color-theme mb-1">Nama Reservasi :
                                            {{ $transaksi->reservasi->nama_reservasi }}</p>
                                        <input type="hidden" value=" {{ $status = $transaksi->status }}">

                                        <p class="text-color-theme mb-1">Nila Asli : {{ $transaksi->harga_acak }}</p>
                                        <p class="text-color-theme mb-1">Pendapatan Investasi :
                                            {{ $transaksi->reservasi->hari }} hari /
                                            {{ $transaksi->reservasi->pendapatan }}%</p>
                                        <p class="text-color-theme mb-1">Penghasilan :Rp
                                            {{ ceil($penghasilan = ceil($transaksi->harga_acak * $transaksi->reservasi->pendapatan) / 100) }}
                                        </p>

                                        <p class="text-color-theme mb-1">Waktu : {{ $transaksi->created_at }} </p>
                                        <p class="text-color-theme mb-1">Batas Waktu Transfare : <b id="demo"></b>
                                        </p>
                                    @endif

                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
        uloasan
    </div>
    {{-- tutup --}}
    </div>


    <!-- Modal -->
    @foreach ($transaksis as $transaksi)
        <div class="modal fade" id="exampleModal{{ $transaksi->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran reservasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="menu-title">
                            <h1>Rincian Pesanan</h1>
                        </div>
                        <div class="divider divider-margins mt-3 mb-3"></div>
                        <div class="content px-1">
                            <p class="text-color-theme mb-1">Waktu Pesan : {{ $transaksi->created_at }}</p>
                            <p class="text-color-theme mb-1">Penjual Reservasi : 083852774278</p>
                            <p class="text-color-theme mb-1">Pembeli Reservasi : {{ $transaksi->user->phone }} </p>
                            <p class="text-color-theme mb-1">Penghasilan :Rp
                                {{ ceil($penghasilan = ($transaksi->harga_acak * $transaksi->reservasi->pendapatan) / 100) }}
                            </p>
                            <p class="text-color-theme mb-1">Nilai Asli : <b>
                                    {{ $hasil_rupiah = 'Rp ' . number_format($transaksi->harga_acak, 0, '', '.') }}
                                </b></p>

                            <p class="text-color-theme mb-1">Batas Waktu Transfare : <b id="demox"></b>
                            </p>

                            <div class="d-flex">
                                <div class="align-self-center">
                                    <img src="images/framework/pay-2.png" width="50">
                                </div>
                                <div class="align-self-center ps-3">
                                    <h5 class="mb-n2">Nama : PUJA MAULINA</h5>
                                    <p class="mt-n1 mb-0 font-10">BANK MANDIRI : 1110019278528</p>
                                </div>

                            </div>

                            <form method="post" action="{{ route('transaksi.update') }}" class="form-material"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="show" name="id" value="{{ $transaksi->id }}">
                                <input type="show" name="reservasi_id" value="{{ $transaksi->id }}">
                                <input type="show" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="show" name="asset"
                                    value="{{ ceil($penghasilan + $transaksi->harga_acak) }}">
                                <input type="show" name="penghasilan"
                                    value="{{ ceil($penghasilan = ($transaksi->harga_acak * $transaksi->reservasi->pendapatan) / 100) }}">
                                <label for="f2a" class="color-theme opacity-30 text-uppercase font-700 font-10 mt-1">Upload
                                    Bukti
                                    Pembayaran</label>
                                <div class="input-style input-style-always-active validate-field no-borders no-icon">
                                    <input type="file" name="gambar" class="form-control validate-email" id="f2a">

                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style input-style-always-active validate-field no-borders no-icon">
                                    <input type="text" name="kode_transaksi" class="form-control validate-number" id="f3"
                                        required>
                                    <label for=" f3" name="kode_transaksi"
                                        class="color-theme opacity-30 text-uppercase font-700 font-10 mt-1">Kode
                                        Transaksi</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>


                                <button type="submit" class="btn btn-success">Pembayaran</button>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>

    <script>
        // Set the date we're counting down to


        @foreach ($transaksis as $transaksi)
            {{ $transaksi->created_at }}
            var countDownDate = new Date().getTime();
        @endforeach
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
