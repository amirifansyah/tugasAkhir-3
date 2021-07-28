<?php
namespace App\Repository;

use App\Models\Bayar;

class LandingRepository{
    public function findBayarId($bayar_id){
        $bayars = Bayar::with(['berat', 'ringan', 'promo'])->find($bayar_id);
        // dd($bayars);
        return $bayars;
    }
}