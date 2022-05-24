<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Ikut;
use App\Models\Profil;
use App\Models\Saldo;
use App\Models\Asset;
use App\Models\Rekening;

use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    //

    public function index()
    {
        // $tima = Ikut::where('referal', Auth()->User()->kode_referal)->first();
        // return view('user.daftar', [
        //     'tima' => $tima,
        // ]);
        
        
        $user = auth()->user()->id;
   
              

        return view('user.akun', [
            'judul' => 'Halaman Akun',
            'transaksis' => Transaksi::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'saldos' => Saldo::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'assets' => Asset::select('*')
                ->where('user_id', '=', $user)
                ->get(),
                
            //   'total' => Asset::select([DB::raw("SUM(asset)")])
            //       ->groupBy("user_id")
            //     ->where('user_id', '=', $user)
            //     ->get()
                
                   'total' => Asset::select('asset')
                   ->groupBy("user_id")
                ->where('user_id', '=', $user)
                ->sum('asset'),
                
                         'totalsaldo' => Saldo::select('saldi')
                   ->groupBy("user_id")
                ->where('user_id', '=', $user)
                ->sum('saldo')
              
        ]);
    }

    public function simpan(Request $request)
    {
        $user = auth()->user()->id;
        $data = $request->validate([
            'nama' => 'required',
            'nama_rekening' => 'required',
            'no_rekening' => 'required',
            /**
             * Show the form for creating a new resource.
             * Whatapps 6289631031237
             * email : yogimaulana100@gmail.com
             * https://github.com/Ays1234
             * https://serbaotodidak.com/
             */
        ]);
        $data['user_id'] = $user;
        dd($data);
        // $waktumahasiswa = Rekening::create($data);

        // $idsaldo = auth()->user()->id;
        // $saldo = Saldo::find($idsaldo);
        // $saldo->saldo = $request->input('saldo');
        // $saldo->update();

        // return redirect('/akun')->with('success', 'Tunggu waktu pembukaan lalu transfare data!!!');
    }
}
