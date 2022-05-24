<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reservasi;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'asset';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}
