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

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user()->id;

        return view('user.saldo', [
            'judul' => 'Halaman Saldo',
            'saldos' => Saldo::select('*')
                ->where('id', '=', $user)
                ->get(),
        ]);
    }

    public function akun(Request $request)
    {
        return view('user.isisaldo', ['judul' => 'Halaman Isi saldo']);
    }

    public function simpan(Request $request)
    {
        //
        $user = auth()->user()->id;
        $validasi = $request->validate([
            'saldo' => 'required',
            'gambar' => 'required',
        ]);

        $gambar = $request->file('gambar');
        $nama_dokumen1 = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $gambar->move('gambarsaldo/', $nama_dokumen1);
        $validasi['gambar'] = $nama_dokumen1;

        $validasi['user_id'] = $user;
        $validasi['status'] = 1;

        Saldo::create($validasi);

        // dd($validasi);

        // $maildata = [
        // 'email' => $request->email,
        // 'remember_token' => $token,
        // ];

        // Mail::to($request->email)->send(new SendVerikasi($maildata));

        // $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

        return redirect('/Saldo')->with('success', 'Saldo sudah dikirim permintaan!!!');
    }

    public function referal(Request $request, $kode_referal)
    {
        $output = 'Halaman Transaksi';
        //     $transaksi = User::where('id', $id)->first();
        return view('user.daftar', ['content' => $output, 'kodereferal' => $transaksi]);
    }
}
