<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservasi;
use App\Models\Rekening;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function rekening()
    {
        return $this->belongsTo('App\Models\Rekening');
    }
}
