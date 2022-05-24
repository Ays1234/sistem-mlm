<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = 'Fadlur Rohman';
        $user->email = 'fadloer@gmail.com';
        $user->kode_transaksi = 'yrka1234';
        $user->password = bcrypt('12345678');
        $user->phone = '085852527575';
        $user->alamat = 'Bulung Kulon Rt 03 Rw 05';
        $user->foto = 'admin';
        $user->status = 'aktif';
        $user->save();
    }
}
