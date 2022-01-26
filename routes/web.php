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


// Vue JS. Yg ini ada parameter dinamis untuk panggil nama
// Route any mirip select * from nama table where idnya berapa
// Yang ini semua url dicari sesuai dengan kaitannya dan dialihkan ke halaman yg sama
Route::get('/{any}', function(){
	return view('main');
})->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
