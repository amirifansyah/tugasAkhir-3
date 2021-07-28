<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ringan(){
        return $this->belongsTo(Ringan::class, 'ringan_id', 'id');
    }

    public function alamat(){
        return $this->hasMany(Alamat::class, 'order_id', 'id');
    }

    public function bayar(){
        return $this->belongsTo(Bayar::class, 'bayar_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
