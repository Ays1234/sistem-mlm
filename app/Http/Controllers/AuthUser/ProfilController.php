<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\Ikut;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    //

    public function index()
    {
        // $transaksi = DB::table('transaksi')
        //     ->join('reservasi', 'transaksi.id_reservasi', '=', 'reservasi.id')
        //     ->join('users', 'transaksi.user_id', '=', 'users.id')
        //     ->select('transaksi.*', 'reservasi.nama_reservasi', 'users.*')
        //     ->get();

        // $transaksi = DB::table('transaksi')
        //     ->join('users', 'users.id', '=', 'transaksi.user_id')
        //     ->get();


        $tima = Ikut::where('referal', Auth()->User()->kode_referal)->first();
        return view('user.daftar',[
            'tima' => $tima]);

        return view('user.profil', ['judul' => 'Halaman Profil', 'profils' => Profil::all()]);
    }

    // public function name($id)
    // {
    //     $output = 'Halaman Transaksi';
    //     $transaksi = Reservasi::where('id', $id)->first();

    //     return view('user.transaksi', [
    //         'content' => $output,
    //         'transaksi' => $transaksi,
    //     ]);
    // }

    public function transaksi(Request $request)
    {
        $transaksi = Reservasi::find($request->id);
        // return view('user.transaksi', compact('transaksi'), ['judul' => 'Halaman Transaksi']);

        $token = Str::random(17);

        $validasi = $request->validate([
            'user_id' => 'required',
            'user_id' => 'required',
            'user_id' => 'required',
        ]);

        // $validasi['password'] = Hash::make($validasi['password']);
        $validasi['gambar'] = $token;
        $validasi['status'] = false;

        Transaksi::create($validasi);

        // dd($validasi);

        // $maildata = [
        //     'email' => $request->email,
        //     'remember_token' => $token,
        // ];

        // Mail::to($request->email)->send(new SendVerikasi($maildata));

        // $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

        return redirect('/login')->with('success', 'Silakan cek email yang sudah didaftarkan untuk verifikasi akun!!!');
    }
}
