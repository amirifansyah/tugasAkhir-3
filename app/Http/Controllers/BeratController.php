<?php

namespace App\Http\Controllers;

use App\Models\Berat;
use App\HTTP\Requests\BeratRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Bayar;
use Auth;

class BeratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'pembeli'){
            return redirect('/landing');
        }
        $berats = Berat::all();
        // Alert::success('Success Title', 'Success Message');
        return view('berat.index', compact('berats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeratRequest $request)
    {
        // $berat = $request->all();
        // $berat['gambar'] = $request->file('gambar')->store('assets/gallery', 'public');

        
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


        
        return redirect()->route('berat.index')->with('pesan', "Makanan Berat Berhasil di Tambahkan");

        // Berat::create($berat);
        // return redirect()->route('berat.index')->with('pesan', "Makanan Berat Berhasil di Tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function show(Berat $berat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function edit(Berat $berat)
    {
        return view('berat.edit', compact('berat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function update(BeratRequest $request, Berat $berat)
    {
        $data = $request->all();

        if($request->gambar){

// dd($berat->gambar);
            if(\File::exists('storage/berat/'.$berat->gambar)){
                \File::delete('storage/berat/'.$berat->gambar);
            }

            $data['gambar'] = $request->file('gambar');
            $filename = time() . '.' . $data['gambar']->getClientOriginalExtension();
            $request->file('gambar')->storeAs('public/berat/'. $filename,  ''); 
            // dd($filename);

            
                
                $berat->update([
                        'nama'           => $request->nama,
                        'gambar'         => $filename,
                        'harga'          => $request->harga,
                        'desc'           => $request->desc,
                ]);
        
                return redirect()->route('berat.index')->with('pesan', "Data Makanan Berat Berhasil di Ubah.");
        }else{

            $berat->update([
                'nama'           => $request->nama,
                'harga'          => $request->harga,
                'desc'           => $request->desc,
            ]);
    
            return redirect()->route('berat.index')->with('pesan', "Data Makanan Berat Berhasil di Ubah.");

        }
     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berat $berat)
    {
        $berat->delete();
        if(\File::exists('storage/berat/'.$berat->gambar)){
            \File::delete('storage/berat/'.$berat->gambar);
        }

        return redirect()->route('berat.index')->with('delete', 'Daftar Makanan Berhasil Di Hapus');
    }

    public function daftar(Bayar $bayar_id){
        // dd($bayar_id);
        // $bayars = Bayar::with(['berat'])->find($bayar_id);
        
        $bayars = Bayar::where('user_id', Auth::user()->id)->Where('status', 0)->latest()->first();
        $berats = Berat::all();
        return view('user.daftarmakananberat', compact('berats', 'bayars'));
    }
}
