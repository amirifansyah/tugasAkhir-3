<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    // {
    //     if($request->role == 'Admin' || $request->role == 'user'){

    //         $validated = $request->validate([
    //             'email'    => 'required',
    //             'password' =>  'required'
    //         ],
    //         [
    //             'email.required'    => 'Email Tidak Boleh Kosong',
    //             'password.required' => 'Password Tidak Boleh Kosong'
    //         ]
    //     );
    //     }else{

    //             // Validasi tidak ada inputan yang di masukan
    //             if ($request->name == Null && $request->password == TRUE){
    //                 Alert::error('Username/Email, ', 'Wajib di Isi');
    //                 return redirect()->route('login');
    //             }elseif ($request->password == Null && $request->name == TRUE) {
    //                 Alert::error('Password ', 'Wajib di Isi');
    //                 return redirect()->route('login');
    //             }elseif($request->password == Null || $request->name == Null){
    //                 Alert::error('Usename/Email, Password', 'Wajib di Isi');
    //                 return redirect()->route('login');
    //             }

    //     }
    // }
    {
        // dd($request);
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required'    => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong'
        ]
    );

        $cek = $request->only('email', 'password');
        // dd($cek);
        if(Auth::attempt($cek)){
            if(Auth::user()->role == 'admin'){
                Alert::success('login Sukses', 'Selamat Datang');
                return redirect()->route('order.index');
            }else if(Auth::user()->role == 'pembeli'){

                                if ($request->name == Null && $request->password == TRUE){
                                    Alert::error('Username/Email, ', 'Wajib di Isi');
                                    return redirect()->route('login');
                                }elseif ($request->password == Null && $request->name == TRUE) {
                                    Alert::error('Password ', 'Wajib di Isi');
                                    return redirect()->route('login');
                                }elseif($request->password == Null || $request->name == Null){
                                    Alert::error('Usename/Email, Password', 'Wajib di Isi');
                                    return redirect()->route('login');
                                }

                return redirect()->route('landing.index');
            }
        }else{
            return redirect('/login');
        };
    }


    public function showLoginForm(){
        return view('masuk');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

