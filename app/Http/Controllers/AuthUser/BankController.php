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
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    //
    public function index()
    {
        // $tima = Ikut::where('referal', Auth()->User()->kode_referal)->first();
        // return view('user.daftar', [
        //     'tima' => $tima,
        // ]);

        $user = auth()->user()->id;
        return view('user.tampil_bank', [
            'judul' => 'Halaman Bank',
            'transaksis' => Transaksi::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'saldos' => Saldo::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'assets' => Asset::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'rekenings' => Rekening::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'users' => User::select('*')
                ->where('id', '=', $user)
                ->get(),
        ]);
    }

    public function show()
    {
        // $tima = Ikut::where('referal', Auth()->User()->kode_referal)->first();
        // return view('user.daftar', [
        //     'tima' => $tima,
        // ]);

        $user = auth()->user()->id;
        return view('user.bank', [
            'judul' => 'Halaman Bank',
            'transaksis' => Transaksi::select('*')
                ->where('user_id', '=', $user)
                ->get(),
            'saldos' => Saldo::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'assets' => Asset::select('*')
                ->where('user_id', '=', $user)
                ->get(),

            'users' => User::select('*')
                ->where('id', '=', $user)
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user()->id;

        $REKENING = User::where('id', $user)->update([
            'nama_rekening' => $request->nama_rekening,
            'no_rekening' => $request->no_rekening,
            'nama' => $request->nama,
        ]);

        // $rekening = new user();

        // $rekening->user_id = $user;
        // $rekening->nama = $request->nama;
        // $rekening->nama_rekening = $request->nama_rekening;
        // $rekening->no_rekening = $request->no_rekening;
        // $rekening->status = 1;

        // $rekening->save();

        // $idsaldo = auth()->user()->id;
        // $saldo = Saldo::find($idsaldo);
        // $saldo->saldo = $request->input('saldo');
        // $saldo->update();

        return redirect('/akun')->with('success', 'Data berhasil disimpan!!!');
    }
}
