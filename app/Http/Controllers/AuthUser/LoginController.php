<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->Route::middleware(['guest'])->except('keluar');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login', ['judul' => 'Halaman Login Aplikasi']);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

    public function loginuser(Request $request)
    {
        //

        $credentials = $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                    Rule::exists('users')->where(function ($query) {
                        $query->where('status', 1);
                    }),
                ],
                'password' => 'required',
                'confirmed',
            ],
            [
                'email' . '.exists' => 'Email anda belum diaktifkan, silakan cek email untuk mengaktifkan',
            ],
        );

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.dashboard'));
        }

        return back()->with('loginError', 'Login Gagal ! Email atau password salah');
    }

    public function keluar()
    {
        Auth::logout();
        request()
            ->session()
            ->invalidate();
        request()
            ->session()
            ->regenerateToken();
        return redirect('/login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
                $this->email() => [
                    'required',
                    Rule::exists('users')->where(function ($query) {
                        $query->where('iniVeri', true);
                    }),
                ],
                'password' => 'required|string',
            ],
            [
                $this->email() . '.exists' => 'Email Anda belum aktif, silakan Aktifivasi terlebih dahulu',
            ],
        );
    }
    //tutup
}
