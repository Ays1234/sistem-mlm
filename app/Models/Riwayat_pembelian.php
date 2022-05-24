<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservasi;

class Riwayat_pembelian extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pembelian';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}
