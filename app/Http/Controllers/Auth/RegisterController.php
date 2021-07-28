<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Auth;
use App\Models\City;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $data)
    {
        

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'role' => 'pembeli',
        //     'password' => Hash::make($data['password']),
        // ]);

        // // $login = $data->only(['email'], ['password']);
        // if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
        //     Alert::success('Success Title', 'Success Message');
            
            // return redirect('/home');
        // }

    }

    protected function register(Request $request){
        // dd($request);
        // $city = City::get();
        // //    dd($city);
        // return view('auth.register', compact('city'));
    //    dd($request); 

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kota' => $request->kota,
            'role' => 'pembeli',
            'password' => Hash::make($request->password),
        ]);

        $login = $request->only('email', 'password');
        if(Auth::attempt($login)){
            Alert::success('login Sukses', 'Selamat Datang');
            
            return redirect('/landing');
        }
    }

    // public function city(){
    //     $city = City::get();
    //     //    dd($city);
    //     return view('auth.register', compact('city'));
 
    //  }

    public function showRegistrationForm(){
        $city = City::get();
            //    dd($city);
            return view('register', compact('city'));
    }
}
