<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bayar(){
        return $this->hasMany(Bayar::class, 'berat_id', 'id');
    }

    public function keranjang(){
        return $this->hasMany(Keranjang::class, 'berat_id', 'id');
    }

    public function promo(){
        return $this->hasMany(Promo::class, 'berat_id', 'id');
    }
}
