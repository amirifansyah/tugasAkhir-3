<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Berat;
use App\Models\Keranjang;
use App\Models\User;
use App\Models\Ringan;
use App\Models\Bayar;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bayar $bayar_id, Request $request)
    {
        if(Auth::user()->role == 'pembeli'){
            return redirect('/landing');
        }
        $bayars = Bayar::with(['berat'])->find($bayar_id);
        $orders = Order::orderBy('created_at', 'DESC')->where('namaMakanan', 'LIKE', '%'.$request->cari.'%')->get();
        return view('order.index', compact('orders'));
    }

    // Order::all()->orderby('id', 'DESC')->get();
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
        // dd($request);
        Order::create([
            'nama'  => $request->nama,
            'no'    => $request->no,
            'alamat'=> $request->alamat,
            'namaMakanan' => $request->namaMakanan,
            'bayar_id'  => $request->bayar_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('landing.index')->with('pesan', 'Terimakasih Pesanan Anda Sedang Kami Proses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('delete', "Orderan Dari $order->nama berhasil di hapus" );
    }
}
