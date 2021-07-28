<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getcity(){
        $client = new Client;

        try {
            $response = $client->get('https://api.rajaongkir.com/starter/city',[
                'headers' => ['key' => 'c4ce04eaec58ac640a1ddd3f061caad9']
            ]);
        } catch (RequestExceptionc $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        // print_r($array_result);
        for($i = 0; $i < count($array_result["rajaongkir"]["results"]); $i++){
            $city = new City;
            $city->id = $array_result["rajaongkir"]["results"][$i]["city_id"];
            $city->name = $array_result["rajaongkir"]["results"][$i]["city_name"];
            // $city->province_id = $array_result["rajaongkir"]["results"][$i]["province_id"];
            $city->save();
            echo 'berhasil disimpan';
        }
    }

    public function city(){
        $city = City::get();
        //    dd($city);
        return view('city', compact('city'));
 
     }
}
