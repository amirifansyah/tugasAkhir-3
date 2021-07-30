<?php 

namespace App\Repository;

use App\Repository\BeratRepository;

class TestRepositories extends BeratRepository
{
    public function store($beratid, $harga='hendry'){
        return $this->StorebBerat($beratid, $harga);
    }
}