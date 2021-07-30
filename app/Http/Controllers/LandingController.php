<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;
use App\Models\Berat;
use App\Models\Ringan;
use App\Models\Bayar;
use App\Models\Promo;
use App\Repository\LandingRepository;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;


class LandingController extends Controller
{
    protected $landingRepo;
    public function __construct(){
        $this->landingRepo = new LandingRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Order::all()->orderby('id', 'DESC')->get();
        // testimoni::orderBy('created_at', 'DESC')->paginate(3);
        
        $berats = berat::limit(3)->orderBy('created_at', 'DESC')->where('nama', 'LIKE', '%'.$request->cari.'%')->get();
        $ringans = Ringan::limit(3)->orderBy('created_at', 'DESC')->where('nama', 'LIKE', '%'.$request->cari.'%')->get();
        $bayars = Bayar::where('user_id', Auth::user()->id)->Where('status', 0)->latest()->first();
        $promos = Promo::limit(4)->orderBy('created_at', 'DESC')->where('nama', 'LIKE', '%'.$request->cari.'%')->get();
        return view('landing', compact('berats', 'ringans', 'bayars', 'promos'));
    }


    // public function masuk(){
    //     return view('masuk');
    // }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function show(Landing $landing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function edit(Landing $landing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landing $landing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landing $landing)
    {
        //
    }

    public function bayar($bayar_id){
        $bayars = $this->landingRepo->findBayarId($bayar_id);
        // dd($bayars);

        // $bayars = Bayar::with(['berat'])->find($bayar_id);
        // $bayars = Bayar::with(['berat'])->where('berat_id', 1)->get();
        // dd($bayars);

        
        return view('user.bayar', compact('bayars'));
    }
}
