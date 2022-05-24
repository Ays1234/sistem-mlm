<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Saldo;
use App\Models\Asset;
use App\Models\Riwayat_pembelian;
use App\Models\Jual;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    //

    public function index()
    {
        $user = auth()->user()->id;
        $siswas = DB::table('Transaksi')
            ->where('user_id', '=', $user)
            ->get();

        $var = [];
        foreach ($siswas as $key => $subscriber) {
            $var[] = $subscriber->user_id_lama;
        }

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

            'bedosaldos' => Asset::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'belis' => riwayat_pembelian::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'rekenings' => rekening::select('*')
                ->where('user_id', '=', $user)
                ->get(),
        ]);
        //tutup foreach
    }

    public function update(Request $request)
    {
        $transaksi = Transaksi::where('id', $request->reservasi_id)->update([
            'status' => 4,
        ]);

        // $asset = Asset::where('id', $id)->update([
        //     'asset' => 0,
        // ]);

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */

        // $asset = Jual::create([
        //     'user_id' => $user,
        //     'reservasi_id' => $request->reservasi_id,
        //     'asset' => $request->asset,
        //     'no_rekening' => $request->no_rekening,
        //     'nama_rekening' => $request->nama_rekening,
        //     'nama' => $request->nama,
        // ]);
        return redirect('/akun')->with('success', 'Tunggu waktu pembukaan lalu transfare data!!!');
    }
}
