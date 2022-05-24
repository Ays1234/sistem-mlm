<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('kode_transaksi');
            $table->string('phone'); //no tlp
            $table->text('alamat')->nullable(); //alamat
            $table->string('foto')->nullable(); //foto profil
            $table->string('status')->default('aktif'); //aktif atau non aktif, customer bisa kita nonaktifkan tanpa menghapus datanya
            $table->rememberToken();
            $table->timestamps();
            $table->string('kode_referal')->null();
            $table->string('urut')->null();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
