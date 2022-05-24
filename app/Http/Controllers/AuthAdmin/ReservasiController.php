<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReservasiController extends Controller
{
    //

    public function index()
    {
        return view('admin.reservasi', ['judul' => 'Halaman Reservasi', 'reservasis' => Reservasi::all()]);
    }

    public function store(Request $request)
    {
        //

        $token = Str::random(17);

        $validasi = $request->validate([
            'nama_reservasi' => 'required|max:255',
            'nama_reservasi' => 'required|max:255',
            'biaya_reservasi' => 'required|max:255',
            'tgl' => 'required',
            'jammasuk' => 'required',
            'jamkeluar' => 'required',
            'gambar' => 'required',
            'harga_awal' => 'required',
            'harga_akhir' => 'required',
            'status' => 'required',
            'pendapatan' => 'required',
            'hari' => 'required',
            'deskripsi' => 'required',
        ]);

        $gambar = $request->file('gambar');
        $nama_dokumen1 = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $gambar->move('gambarreservasi/', $nama_dokumen1);

        $validasi['jammasuk'] = Carbon::parse($request->input('jammasuk'))->format('h:i');
        $validasi['jamkeluar'] = Carbon::parse($request->input('jamkeluar'))->format('h:i');
        $validasi['tgl'] = Carbon::parse($request->input('tgl'))->format('Y-m-d');
        $validasi['gambar'] = $nama_dokumen1;
        $validasi['status'] = $request->status;
        $validasi['kode_reservasi'] = $token;

        Reservasi::create($validasi);

        // dd($validasi);

        // $maildata = [
        //     'email' => $request->email,
        //     'token_aja' => $token,
        // ];

        // Mail::to($request->email)->send(new SendDemoMail($maildata));

        // $request->session()->flash('success', 'Pendaftaraan berhasil !!! Silakan login');

        return redirect('/reservasi')->with('success', 'Data Reservasi telah masuk!!!');
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        //
        $token = Str::random(17);
        $anugambar = 'gambarreservasi/' . $request->filegambar;

        if ($request->file('gambar') == '') {
            $reservasi = Reservasi::where('id', $request->reservasi)->update([
                'kode_reservasi' => $token,
                'nama_reservasi' => $request->nama_reservasi,
                'biaya_reservasi' => $request->biaya_reservasi,
                'tgl' => $request->tgl,
                'jammasuk' => $request->jammasuk,
                'jamkeluar' => $request->jamkeluar,
                'harga_awal' => $request->harga_awal,
                'harga_akhir' => $request->harga_akhir,
                'status' => $request->status,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            //hapus old image

            if (File::exists($anugambar)) {
                File::delete($anugambar);
            }

            $gambar = $request->file('gambar');
            $nama_dokumen1 = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
            $gambar->move('gambarreservasi/', $nama_dokumen1);

            $reservasi = Reservasi::where('id', $request->reservasi)->update([
                'kode_reservasi' => $token,
                'nama_reservasi' => $request->nama_reservasi,
                'biaya_reservasi' => $request->biaya_reservasi,
                'tgl' => $request->tgl,
                'jammasuk' => $request->jammasuk,
                'jamkeluar' => $request->jamkeluar,
                'harga_awal' => $request->harga_awal,
                'harga_akhir' => $request->harga_akhir,
                'status' => $request->status,
                'deskripsi' => $request->deskripsi,
                'gambar' => $nama_dokumen1,
            ]);
        }

        return redirect('/reservasi')->with('success', 'Berhasil di Update data');
    }

    public function destroy(Request $request, $id)
    {
        //

        $anugambar = 'gambarreservasi/' . $request->hapusgambar;

        if (File::exists($anugambar)) {
            File::delete($anugambar);
        }

        DB::table('reservasi')
            ->where('id', $id)
            ->delete();

        return redirect('/reservasi')->with('success', 'Berhasil di Hapus data');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
