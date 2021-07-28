<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function berat(){
        return $this->belongsTo(Berat::class, 'berat_id', 'id');
    }

    public function ringan(){
        return $this->belongsTo(Ringan::class, 'ringan_id', 'id');
    }

    public function bayar(){
        return $this->hasMany(Bayar::class, 'promo_id', 'id');
    }
}
