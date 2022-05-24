<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->increments('id');
            $table
                ->integer('user_id')
                ->unsigned()
                ->nullable();
            $table->string('kode_reservasi');
            $table->string('nama_reservasi');
            $table->double('biaya_reservasi', 12, 2)->default(0);
            $table->text('deskripsi');
            $table->string('gambar')->nullable(); //banner produknya
            $table->double('harga_awal', 12, 2)->default(0);
            $table->double('harga_akhir', 12, 2)->default(0);
            $table->date('tgl');
            $table->time('jammasuk')->nullable();
            $table->time('jamkeluar')->nullable();
            $table->time('jamkerja')->nullable();
            $table->string('status');
            $table->string('pendapatan');
            $table->string('hari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
}
