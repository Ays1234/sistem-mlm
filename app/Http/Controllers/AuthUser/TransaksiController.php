<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\Asset;
use App\Models\Riwayat_pembelian;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    //

    public function index()
    {
        $user = auth()->user()->id;

        # code...

        return view('user.transaksi', [
            'judul' => 'Halaman Transaksi',
            'transaksis' => Transaksi::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'bookings' => Transaksi::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'saldos' => Saldo::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'assets' => Asset::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'belis' => riwayat_pembelian::select('*')
                ->where('user_id', '=', $user)
                ->get(),

   
        ]);
        //tutup foreach
    }

    public function update(Request $request)
    {
        $gambar = $request->file('gambar');
        $nama_dokumen1 = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $gambar->move('transfare/', $nama_dokumen1);

        $transaksi = Transaksi::where('id', $request->id)->update([
            'status' => 2,
            'gambar' => $nama_dokumen1,
            'penghasilan' => $request->penghasilan,
        ]);

        // $asset = Asset::where('id', $request->id)->update([
        //     'user_id' => $request->user_id,
        //     'reservasi_id' => $request->reservasi_id,
        //     'asset' => $request->asset,
        // ]);

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */

        // $asset = Asset::create([
        //     'user_id' => $request->user_id,
        //     'reservasi_id' => $request->reservasi_id,
        //     'asset' => $request->asset,
        // ]);

        return redirect('/transaksi')->with('success', 'Silakan cek email yang sudah didaftarkan untuk verifikasi akun!!!');
    }
}
