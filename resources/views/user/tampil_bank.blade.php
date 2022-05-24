@extends('layouts.user_tampilan')
@section('tampil_bank')
    <div class="page-content header-clear-medium">
        <div class="card card-style">
            <div class="content">
                <h4>Akun bank</h4>

                @foreach ($users as $user)
                    <div class="col-12">

                        <label for="form41" class="color-blue-dark">Nama Pemilik : {{ $user->nama }}</label>

                    </div>


                    <div class="col-12">

                        <label for="form41" class="color-blue-dark">Nomor Rekening :
                            {{ $user->no_rekening }}</label>

                    </div>

                    <div class="col-12">

                        <label for="form41" class="color-blue-dark">Nama Bank : {{ $user->nama_rekening }}</label>

                    </div>
                @endforeach
                <a href="/bank/show/" class="btn btn-success">Akun
                    Bank</a>
            </div>
        </div>

    </div>
    <!-- End of Page Content-->

    <!--Menu Events-->
@endsection
