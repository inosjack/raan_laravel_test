<?php

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
    $hotels =  \App\Hotel::all();
    return view('hotels')->with(['hotels' => $hotels]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\HotelController@create')->name('hotel.create');
Route::post('/admin', 'Admin\HotelController@store')->name('hotel.store');
