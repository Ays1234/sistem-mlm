<?php

namespace Database\Seeders;

use App\Models\Reservasi;
use Illuminate\Database\Seeder;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Str;

class ReservasiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));

        $reservasi = new Reservasi();
        $reservasi->kode_reservasi = Str::random(17);
        // $reservasi->user_id = '1';
        $reservasi->nama_reservasi = 'Ruko';
        $reservasi->batas_user = '2';
        $reservasi->deskripsi = 'Ruko';
        $reservasi->tgl = $date->format('Y-m-d');
        $reservasi->jammasuk = $date->format('H:i:s');
        $reservasi->jamkeluar = $date->format('H:i:s');
        $reservasi->jamkerja = $date->format('H:i:s');
        $reservasi->harga = '10000';
        $reservasi->status = '1';
        $reservasi->foto = '/foto';
        $reservasi->save();
    }
}
