<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\Asset;
use App\Models\Jual;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    //

    public function index()
    {
        // $bidang = Bidang::with('rencana')->get(); // eager load

        // $pembelian=Transaksi::with('Rekening')->get();
        return view('admin.pembelian', [
            'judul' => 'Halaman Pembelian',

            'pembelians' => Transaksi::all(),
        ]);
    }

    public function update(Request $request)
    {
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

        $pembelian = Transaksi::where('id', $request->id)->update([
            'status' => 5,
        ]);

        $asset = Asset::where('user_id', $request->user_id)->update([
            'asset' => 0,
        ]);

        // DB::table('Transaksi') //nanti pas dijual hilang
        //     ->where('id', $request->id)
        //     ->delete();

        // DB::table('Jual') //nanti pas dijual hilang
        //     ->where('id', $request->id)
        //     ->delete();

        return redirect('/admin/pembelian')->with('success', 'Akun Sudah di verikasi!!!');
    }
}
