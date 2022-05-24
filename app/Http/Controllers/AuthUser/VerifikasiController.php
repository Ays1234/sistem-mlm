<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\MainReset;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendDemoMail;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('user.verifikasi', ['judul' => 'Halaman Verikasi Akun']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifikasi(Request $request)
    {
        $request->validate([
            'remember_token ' => 'remember_token',
        ]);

        $user = User::where('remember_token', $request->remember_token)->first();

        if ($user === null) {
            return redirect()
                ->back()
                ->with('loginError', 'OTP salah coba cek kembali !!!');
        } else {
            # code...
            $user->update([
                'status' => true,
                'remember_token' => null,
            ]);

            return redirect('/login')->with('success', 'Akun anda berhasil di Verifikasi !!! Silakan login');
        }

        // Mail::send('password.very',['token' => $token], function($message) use ($request) {
        //           $message->from($request->email);
        //           $message->to('kakvikunkhmer7777@gmail.com');
        //           $message->subject('Reset Password Notification');
        //       });

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }

    public function reset(Request $request)
    {
        $token = Str::random(17);

        $validasi = $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            ['email.exists' => 'Email tidak ditemukan, Silakan Cek Kembali'],
        );
        $user = User::where('email', $request->email)->first();

        if ($user === null) {
            return redirect()->back();
        } else {
            # code...
            $user->remember_token = $token;
            $user->save();

            $maildata = [
                'email' => $request->email,
                'remember_token' => $token,
            ];

            Mail::to($request->email)->send(new SendVerikasi($maildata));

            return redirect('/verifikasi')->with('success', 'Kode Verikasi sudah dikirim ulang Kembali');
        }

        // Mail::send('password.very',['token' => $token], function($message) use ($request) {
        //           $message->from($request->email);
        //           $message->to('kakvikunkhmer7777@gmail.com');
        //           $message->subject('Reset Password Notification');
        //       });

        /**
         * Show the form for creating a new resource.
         * Whatapps 6289631031237
         * email : yogimaulana100@gmail.com
         * https://github.com/Ays1234
         * https://serbaotodidak.com/
         */
    }
}
