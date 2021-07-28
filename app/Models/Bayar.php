<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function berat(){
        return $this->belongsTo(Berat::class, 'berat_id', 'id');
    }

    public function ringan(){
        return $this->belongsTo(Ringan::class, 'ringan_id', 'id');
    }

    public function keranjang(){
        return $this->belongsTo(Keranjang::class, 'keranjang_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'bayar_id', 'id');
    }

    public function promo(){
        return $this->belongsTo(Promo::class, 'promo_id', 'id');
    }
}
