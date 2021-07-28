<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ringan extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'ringan_id', 'id');
    }

    public function bayar(){
        return $this->hasMany(Bayar::class, 'ringan_id', 'id');
    }

    public function promo(){
        return $this->hasmany(Promo::class, 'ringan_id', 'id');
    }
}
