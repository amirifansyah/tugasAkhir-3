<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use Illuminate\Http\Request;
use App\Models\Berat;
use App\Models\Ringan;
use App\Models\Keranjang;
use Auth;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd ($request);
        // $nama = Berat::where('id', $request->id)->first();
        // $ringan = Ringan::where('id', $request->id)->first();
        // dd($ringan);
        if($request->bayars_id){
            $bayar = Bayar::find($request->bayars_id);
            $bayar->update([
                'req' => $request->req,
                'berat_id' => $request->berat_id,
                'ringan_id' => $request->ringan_id,
                'promo_id' => $request->promo_id,
                'keranjang_id' => $request->keranjang_id,
                'user_id' => Auth::user()->id,
                'jumlah' => $request->jumlah,
                'status' => 0
            ]);
        }else{
            $bayar = Bayar::create([
                'req' => $request->req,
                'berat_id' => $request->berat_id,
                'ringan_id' => $request->ringan_id,
                'promo_id' => $request->promo_id,
                'keranjang_id' => $request->keranjang_id,
                'user_id' => Auth::user()->id,
                'jumlah' => $request->jumlah,
                'status' => 0
            ]);
        }
        $bayar_id = $bayar->id;
        return redirect('/landing/pay/'.$bayar_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function show(Bayar $bayar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bayar $bayar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bayar $bayar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bayar $bayar)
    {
        //
    }
}
