@extends('layouts.user_tampilan')
@section('bank')
    <div class="page-content header-clear-medium">

        <div class="card card-style">
            <div class="content">
                <h4>Akun bank</h4>
                <p>
                    Masukan data akun bank anda
                </p>
                <form action="{{ route('user.simpan.bank') }}" method="POST" class="d-inline">
                    @csrf
                    <div class="row mb-0">
                        <div class="col-12">
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" name="nama" class="form-control validate-name" id="form41"
                                    placeholder="Nama Pemilik">
                                <label for="form41" class="color-blue-dark">Nama Pemilik</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <em class="font-14 color-red-dark">*</em>
                            </div>
                        </div>

                    </div>
                    <div class="input-style has-borders no-icon validate-field mb-4">
                        <input type="text" name="no_rekening" class="form-control validate-tel" id="form42"
                            placeholder="Nomor Rekening">
                        <label for="form42" class="color-blue-dark">Nomor Rekening</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em class="font-14 color-red-dark">*</em>
                    </div>
                    <div class="row mb-0">
                        <div class="col-4">
                            <div class="input-style has-borders no-icon mb-4">
                                <label for="form51" class="color-blue-dark">Nama Bank</label>
                                <select id="form51" name="nama_rekening">
                                    <option value="default" disabled selected>Nama Bank</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Neo">Neo</option>
                                    
                                        <option value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                                    <option value="Bank Danamon">Bank Danamon</option>


    <option value="Bank Riau">Bank Riau</option>
                                    <option value="Bank Sumut">Bank Sumut</option>


    <option value="Bank Panin">Bank Panin</option>
                                    <option value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                                    <option value="Bank Syariah Indonesia">Bank Syariah Indonesia</option>
                                    <option value="Bank Nagari">Bank Nagari</option>
                                    <option value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                                    <option value="Bank MayBank Indonesia">Bank MayBank Indonesia</option>
                                    <option value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>


                                </select>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <i class="fa fa-check disabled invalid color-red-dark"></i>
                                <em></em>
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>



    </div>
    <!-- End of Page Content-->

    <!--Menu Events-->
@endsection
