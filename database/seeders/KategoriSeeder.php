<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $kategori = new Kategori();
        $kategori->kode_kategori = '1';
        $kategori->nama_kategori = 'ruko';
        $kategori->slug_kategori = 'ruko';
        $kategori->deskripsi_kategori = '085852527575';
        $kategori->status = '1';
        $kategori->foto = '/foto';
        $kategori->save();
    }
}
