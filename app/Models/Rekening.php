<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class Rekening extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    protected $table = 'rekening';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
