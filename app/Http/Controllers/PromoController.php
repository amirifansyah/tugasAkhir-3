<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Berat;
use App\Models\Ringan;
use Auth;

class PromoController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'pembeli'){
            return redirect('/landing');
        }
        $promos = Promo::all();
        return view('promo.index', compact('promos'));
    }

    public function create(){
        $berats = Berat::all();
        $ringans = Ringan::all();
        return view('promo.create', compact('berats', 'ringans'));
    }

    public function store(Request $request){

        // dd($request);
        
        $nama = Berat::where('id', $request->id)->first();
        $data = $request->all();
        $data['gambar'] = $request->file('gambar');
        $filename = time() . '.' . $data['gambar']->getClientOriginalExtension();
        $request->file('gambar')->storeAs('public/promo/'. $filename,  ''); 
       
        Promo::create([
            'nama' => $request->nama,
            'desc' => $request->desc,
            'gambar' => $filename,
            'harga' => $request->harga,
            'berat_id' => $request->berat_id,
            'ringan_id' => $request->ringan_id,
            
        ]);
        return redirect()->route('promo.index')->with('pesan', "Promo Berhasil Disimpan");
    }

    public function destroy(Promo $promo){
        $promo->delete();
        return redirect()->route('promo.index')->with('delete', 'Promo berhasil di hapus');
    }

    public function edit(Promo $promo){
        $ringans = Ringan::all();
        $berats = Berat::all();
        return view('promo.edit', compact('promo', 'ringans', 'berats'));
    }

    public function update(Request $request, Promo $promo){
        $validated = $request->validate([
            'nama' => '',
            'desc' => '',
            'harga' => '',
            'berat_id' => '',
            'ringan_id' => '',
        ]);
        $promo->update($validated);
        return redirect()->route('promo.index')->with('pesan', "Promo Berhasil Diubah");
        
    }
}
