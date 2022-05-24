<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ikut;
use Illuminate\Support\Str;
use App\Events\Auth\UserActivationEmail;
use Mail;
use Session;
use App\Mail\SendVerikasi;

class DaftarController extends Controller
{
    //
    public function index()
    {
        return view('user.daftar', ['judul' => 'Halaman Daftar Aplikasi']);
        //
    }

    public function store(Request $request)
    {
        //

        $token = Str::random(17);

        $validasi = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email:dns|unique:users,email',
                'password' => 'required|min:8,password|max:255',
                'kode_transaksi' => 'required|min:8,kode_transaksi|max:255',
                'alamat' => 'required|max:255',
                'phone' => 'required',
            ],
            [
                'username.unique' => 'Username sudah terdaftar, silakan coba yang lain',
                'email.unique' => 'Email sudah terdaftar, silakan coba yang lain',
                'password.min' => 'Password Minimal 8 digit',
                'kode_transaksi.min' => 'Kode Trasaksi Minimal 8 digit',
            ],
        );

        $validasi['password'] = Hash::make($validasi['password']);
        $validasi['remember_token'] = $token;
        $validasi['status'] = false;
        $validasi['kode_referal'] = $token;

        // $validasi['urut'] = $request->urutan;

        User::create($validasi);

        // if ($request->urutan > 3) {
        // } else {
        //     $validasix['ikut'] = $request->urutan;
        //     $validasix['referal'] = $request->kode_referal;
        //     Ikut::create($validasix);
        // }

        // dd($validasi);

        $maildata = [
            'email' => $request->email,
            'remember_token' => $token,
        ];

        Mail::to($request->email)->send(new SendVerikasi($maildata));

        // $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

        return redirect('/login')->with('success', 'Silakan cek email yang sudah didaftarkan untuk verifikasi akun!!!');
    }

    public function referal(Request $request, $kode_referal)
    {
        $output = 'Halaman Referal';
        $transaksi = User::where('kode_referal', $kode_referal)->first();
        return view('user.referal', ['judul' => $output, 'kode_referal' => $transaksi]);
    }
}
