<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\Asset;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        //
        return view('user.dashboard', [
            'judul' => 'Halaman Dasboard',
            'reservasis' => Reservasi::all(),
            'datas1' => Reservasi::select('*')
                ->where('id', '=', 1)
                ->get(),
            'datas2' => Reservasi::select('*')
                ->where('id', '=', 2)
                ->get(),

            'datas3' => Reservasi::select('*')
                ->where('id', '=', 3)
                ->get(),
            'datas4' => Reservasi::select('*')
                ->where('id', '=', 4)
                ->get(),
            'datas5' => Reservasi::select('*')
                ->where('id', '=', 5)
                ->get(),
            'datas6' => Reservasi::select('*')
                ->where('id', '=', 6)
                ->get(),
            'datas7' => Reservasi::select('*')
                ->where('id', '=', 7)
                ->get(),
            'datas8' => Reservasi::select('*')
                ->where('id', '=', 8)
                ->get(),
            'saldos' => Saldo::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'assets' => Asset::select('*')
                ->where('user_id', '=', $user)
                ->get(),
         
        ]);
    }

    public function simpan(Request $request)
    {
        $user = auth()->user()->id;
        $transaksiscek = Transaksi::select('*')
            ->where('user_id', '=', $user)
            ->where('reservasi_id', '=', $request->reservasi_id)
            ->limit(1) // here is yours limit
            ->get();

        $transaksis = Transaksi::select('*')
            ->where('status', '=', 1)
            ->where('reservasi_id', '=', $request->reservasi_id)
            ->inRandomOrder()
            ->limit(1) // here is yours limit
            ->get();

        // if ($transaksiscek->isEmpty()) {
        $data = $request->validate([
            'user_id' => 'required',
            'reservasi_id' => 'required',
            'harga_acak' => 'required',
            // 'rekening_id' => 'required',
            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);

        $awal = $request->harga_awal;
        $akhir = $request->harga_akhir;
        $data['user_id_lama'] = $request->user_id;
        $data['status'] = 1;
        $data['harga_acak'] = rand($awal, $akhir);
        // $data['rekening_id'] = rekening_id;
        $waktumahasiswa = Transaksi::create($data);
        return redirect('/dashboard')->with('success', 'Tunggu waktu pembukaan lalu transfare data!!!');
        // } else {
        # code...
        // foreach ($transaksis as $transaksi) {
        //     DB::table('transaksi')
        //         ->where('id', $transaksi->id)
        //         ->update([
        //             'user_id' => $request->user_id,
        //             'reservasi_id' => $request->reservasi_id,
        //         ]);

        //     $assets = Asset::select('*')
        //         ->where('user_id', '=', $transaksi->user_id)
        //         ->where('reservasi_id', '=', $transaksi->reservasi_id)
        //         ->limit(1) // here is yours limit
        //         ->get();
        //     foreach ($assets as $asset) {
        //         echo ceil($hasil = ($asset->asset * 30) / 100);
        //         echo $hasilbaru = ceil($hasil + $asset->asset);
        //         DB::table('asset')
        //             ->where('id', $asset->id)
        //             ->update([
        //                 'user_id' => $request->user_id,
        //                 'reservasi_id' => $request->reservasi_id,
        //                 'asset' => $hasilbaru,
        //             ]);
        //     }
        // }
        //foreech
        // }

        //     $awal = $request->harga_awal;
        //     $akhir = $request->harga_akhir;
        //     $data['harga_acak'] = rand($awal, $akhir);
        //     $waktumahasiswa = Transaksi::create($data);
        // } else {
        //     DB::table('Transaksi')
        //         ->where('user_id', $request->user_id)
        //         ->update([
        //             'user_id' => $transaksi->user_id,
        //         ]);
        // }

        // $idsaldo = auth()->user()->id;
        // $saldo = Saldo::find($idsaldo);
        // $saldo->saldo = $request->input('saldo');
        // $saldo->update();

        // DB::table('saldo')
        //     ->where('user_id', auth()->user()->id)
        //     ->update([
        //         'saldo' => $request->saldo,
        //     ]);
    }
    // return redirect('/dashboard')->with('success', 'Tunggu waktu pembukaan lalu transfare data!!!');

    public function referal(Request $request, $kode_referal)
    {
        $output = 'Halaman Transaksi';
        //     $transaksi = User::where('id', $id)->first();
        return view('user.daftar', ['content' => $output, 'kodereferal' => $transaksi]);
    }
}
