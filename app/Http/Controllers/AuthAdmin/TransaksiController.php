<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\Asset;
use App\Models\Riwayat_pembelian;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    //

    public function index()
    {
        return view('admin.transaksi', [
            'judul' => 'Halaman Transaksi',
            'transaksis' => Transaksi::all(),
        ]);
    }

    public function update(Request $request)
    {
        $transaksi = Transaksi::where('id', $request->id)->update([
            'status' => 3,
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

        $riwayat_pembelian = Riwayat_pembelian::create([
            'user_id' => $request->user_id,
            'reservasi_id' => $request->reservasi_id,
            'status' => 3,
        ]);

        $asset = Asset::create([
            'user_id' => $request->user_id,
            'reservasi_id' => $request->reservasi_id,
            'asset' => $request->asset,
            'status' => 1,
        ]);

        // DB::table('Transaksi') //nanti pas dijual hilang
        //     ->where('id', $request->id)
        //     ->delete();

        return redirect('/admin/transaksi')->with('success', 'Akun Sudah di verikasi!!!');
    }
}
