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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::Resource('reportpenjualan','laporanpenjualan');
Route::resource('satuans', 'satuanController');

Route::resource('dataobats', 'dataobatController');
Route::get('/getstatistik','laporanpenjualan@datastatistik');


Route::resource('transaksiObats', 'transaksi_obatController');