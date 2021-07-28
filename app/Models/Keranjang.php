<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ringan()
    {
        return $this->belongsTo(Ringan::class, 'ringan_id', 'id');
    }

    public function berat(){
        return $this->belongsTo(Berat::class, 'berat_id', 'id');
    }

    public function bayar(){
        return $this->hasOne(Bayar::class, 'keranjang_id', 'id');
    }
}
