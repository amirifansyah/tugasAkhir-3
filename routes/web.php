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
    Route::get('/', 'BeratController@index')->name('berat.index')->middleware('auth');
    Route::get('/create', 'BeratController@create')->name('berat.create')->middleware('auth');
    Route::post('/', 'BeratController@store')->name('berat.store')->middleware('auth');
    Route::get('/{berat}/edit', 'BeratController@edit')->name('berat.edit')->middleware('auth');
    Route::patch('/{berat}', 'BeratController@update')->name('berat.update')->middleware('auth');
    Route::delete('/{berat}', 'BeratController@destroy')->name('berat.destroy')->middleware('auth');
    Route::get('/daftarmakanan', 'BeratController@daftar')->name('berat.daftar')->middleware('auth');
});

Route::prefix('/ringan')->group(function(){
    Route::get('/', 'RinganController@index')->name('ringans.index')->middleware('auth');
    Route::get('/create', 'RinganController@create')->name('ringan.create')->middleware('auth');
    Route::post('/', 'RinganController@store')->name('ringan.store')->middleware('auth');
    Route::get('{ringan}/edit', 'RinganController@edit')->name('ringan.edit')->middleware('auth');
    Route::patch('/{ringan}', 'RinganController@update')->name('ringan.update')->middleware('auth');
    Route::delete('/{ringan}', 'RinganController@destroy')->name('ringan.destroy')->middleware('auth');
    Route::get('/daftarmakanan', 'RinganController@daftar')->name('daftar.index')->middleware('auth');
});

Route::prefix('/promo')->group(function(){
    Route::get('/', 'PromoController@index')->name('promo.index')->middleware('auth');
    Route::get('/create', 'PromoController@create')->name('promo.create')->middleware('auth');
    Route::post('/', 'PromoController@store')->name('promo.store')->middleware('auth');
    Route::get('/{promo}/edit', 'PromoController@edit')->name('promo.edit')->middleware('auth');
    Route::patch('/{promo}', 'PromoController@update')->name('promo.update')->middleware('auth');
    Route::delete('/{promo}', 'PromoController@destroy')->name('promo.destroy')->middleware('auth');
});


Route::prefix('/landing')->group( function(){
    Route::get('/', 'LandingController@index')->name('landing.index')->middleware('auth');
    Route::get('/pay/{bayar}', 'LandingController@bayar')->name('bayar.index')->middleware('auth');
    
});

Route::prefix('/order')->group( function(){
    Route::get('/', 'OrderController@index')->name('order.index')->middleware('auth');
    Route::post('/{bayar}', 'OrderController@store')->name('order.store')->middleware('auth');
    Route::delete('/{order}', 'OrderController@destroy')->name('order.destroy')->middleware('auth');
});

Route::prefix('/bayar')->group(function(){
    Route::post('/', 'BayarController@store')->name('bayar.store')->middleware('auth');
});

Route::prefix('/keranjang')->group(function(){
    Route::get('/', 'KeranjangController@index')->name('keranjang.index')->middleware('auth');
});

Route::get('/city', 'CityController@city')->name('city.index')->middleware('auth');
Route::get('/kota', 'CityController@getcity')->name('kota.index')->middleware('auth');

Route::get('/user', 'HomeController@user')->name('user.index');
Route::delete('/user/{user}', 'HomeController@destroy')->name('user.destroy')->middleware('auth');


