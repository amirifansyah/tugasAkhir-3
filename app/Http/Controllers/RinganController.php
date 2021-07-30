<?php

namespace App\Http\Controllers;

use App\Models\Ringan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Bayar;
use Auth;


class RinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role == 'pembeli'){
            return redirect('/landing');
        }
        $ringans = Ringan::where('nama', 'LIKE', '%'.$request->cari.'%')->get();
        return view('ringan.index', compact('ringans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ringan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        $data['gambar'] = $request->file('gambar');
        $filename = time() . '.' . $data['gambar']->getClientOriginalExtension();
        $request->file('gambar')->storeAs('public/ringan/'. $filename,  ''); 
        // dd($filename);

        Ringan::create([
            'nama'           => $request->nama,
            'gambar'         => $filename,
            'harga'          => $request->harga,
            'desc'           => $request->desc,
        ]);


        
        return redirect()->route('ringans.index')->with('pesan', "Makanan Ringan Berhasil di Tambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ringan  $ringan
     * @return \Illuminate\Http\Response
     */
    public function show(Ringan $ringan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ringan  $ringan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ringan $ringan)
    {
        return view('ringan.edit', compact('ringan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ringan  $ringan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ringan $ringan)
    {
        $data = $request->all();

        if($request->gambar){

// dd($berat->gambar);
            if(\File::exists('storage/ringan/'.$ringan->gambar)){
                \File::delete('storage/ringan/'.$ringan->gambar);
            }

            $data['gambar'] = $request->file('gambar');
            $filename = time() . '.' . $data['gambar']->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/ringan/'. $filename,  ''); 
            // dd($filename);

            
                
                $ringan->update([
                        'nama'           => $request->nama,
                        'gambar'         => $filename,
                        'harga'          => $request->harga,
                        'desc'           => $request->desc,
                ]);
        
                return redirect()->route('ringans.index')->with('pesan', "Daftar makanan Berhasil di Ubah.");
        }else{

            $ringan->update([
                'nama'           => $request->nama,
                'harga'          => $request->harga,
                'desc'           => $request->desc,
            ]);
    
            return redirect()->route('ringans.index')->with('pesan', "Daftar MAkanan Berhasil di Ubah.");

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ringan  $ringan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ringan $ringan)
    {
        $ringan->delete();
        if(\File::exists('storage/ringan/'.$ringan->gambar)){
            \File::delete('storage/ringan/'.$ringan->gambar);
        }
        return redirect()->route('ringans.index')->with('delete', 'Daftar Maknan Berhasil Dihapus');
    }

    public function daftar(){
        
        $bayars = Bayar::where('user_id', Auth::user()->id)->Where('status', 0)->latest()->first();
        $ringans = Ringan::all();
        return view('user.daftarmakananringan', compact('ringans', 'bayars'));
    }
}
