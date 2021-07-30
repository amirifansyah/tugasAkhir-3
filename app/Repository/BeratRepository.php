<?php
namespace App\Repository;

use App\Models\Berat;
use Illuminate\Http\Request;

class BeratRepository{
    public function StorebBerat($berats){
      $berat = Berat::latest();
        return $berat;
    }

    public function store(Request $request){
        $result = [
            'status' => false,
            'message' => ''
        ];

        try {
            $berat = new Berat();

            $data = $request->all();
            $data['gambar'] = $request->file('gambar');
            $filename = time() . '.' . $data['gambar']->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/berat/'. $filename,  ''); 
        // dd($filename);

                 Berat::create([
                 'nama'           => $request->nama,
                 'gambar'         => $filename,
                 'harga'          => $request->harga,
                 'desc'           => $request->desc,
                 ]);

            $result['status'] = true;
            $request['message'] = "Data Karyaawan Berhasil ditambahkan";

            return $result;
        } catch (\Throwable $th) {
            dd($th);
            $result['message'] = 'Funtion Store Berat Error'.$th->getMessage();
            return $result;
        }
    }
}