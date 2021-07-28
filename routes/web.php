<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/makananberat')->group( function(){
    Route::get('/', 'BeratController@index')->name('berat.index');
    Route::get('/create', 'BeratController@create')->name('berat.create');
    Route::post('/', 'BeratController@store')->name('berat.store');
    Route::get('/{berat}/edit', 'BeratController@edit')->name('berat.edit');
    Route::patch('/{berat}', 'BeratController@update')->name('berat.update');
    Route::delete('/{berat}', 'BeratController@destroy')->name('berat.destroy');
    Route::get('/daftarmakanan', 'BeratController@daftar')->name('berat.daftar');
});

Route::prefix('/ringan')->group(function(){
    Route::get('/', 'RinganController@index')->name('ringans.index');
    Route::get('/create', 'RinganController@create')->name('ringan.create');
    Route::post('/', 'RinganController@store')->name('ringan.store');
    Route::get('{ringan}/edit', 'RinganController@edit')->name('ringan.edit');
    Route::patch('/{ringan}', 'RinganController@update')->name('ringan.update');
    Route::delete('/{ringan}', 'RinganController@destroy')->name('ringan.destroy');
    Route::get('/daftarmakanan', 'RinganController@daftar')->name('daftar.index');
});

Route::prefix('/promo')->group(function(){
    Route::get('/', 'PromoController@index')->name('promo.index');
    Route::get('/create', 'PromoController@create')->name('promo.create');
    Route::post('/', 'PromoController@store')->name('promo.store');
    Route::get('/{promo}/edit', 'PromoController@edit')->name('promo.edit');
    Route::patch('/{promo}', 'PromoController@update')->name('promo.update');
    Route::delete('/{promo}', 'PromoController@destroy')->name('promo.destroy');
});


Route::prefix('/landing')->group( function(){
    Route::get('/', 'LandingController@index')->name('landing.index');
    Route::get('/pay/{bayar}', 'LandingController@bayar')->name('bayar.index');
    
});

Route::prefix('/order')->group( function(){
    Route::get('/', 'OrderController@index')->name('order.index');
    Route::post('/{bayar}', 'OrderController@store')->name('order.store');
    Route::delete('/{order}', 'OrderController@destroy')->name('order.destroy');
});

Route::prefix('/bayar')->group(function(){
    Route::post('/', 'BayarController@store')->name('bayar.store');
});

Route::prefix('/keranjang')->group(function(){
    Route::get('/', 'KeranjangController@index')->name('keranjang.index');
});

Route::get('/city', 'CityController@city')->name('city.index');
Route::get('/kota', 'CityController@getcity')->name('kota.index');

Route::get('/user', 'HomeController@user')->name('user.index');


