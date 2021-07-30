<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(Auth::user()->role == 'admin'){
            return view('admin');
        }elseif(Auth::user()->role == 'pembeli'){
            return redirect('/landing');
        }
    }

    

    public function user(Request $request){
        if(Auth::user()->role == 'pembeli'){
            return redirect('/landing');
        }
        $users = User::where('name', 'LIKE', '%'.$request->cari.'%')->get();
        return view('admin.user', compact('users'));
    }
}
