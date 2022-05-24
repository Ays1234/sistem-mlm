<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class Jual extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    protected $table = 'jual';
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
        return $this->belongsTo(Rekening::class);
    }
}
