<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\HomeController;
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

//Tambahkan route baru!!!
Route::get('/', function () {
    return view('Pengunjung.view_home_pengunjung');
});

//Route untuk Data Loker
Route::get('/loker', 'LokerController@lokertampil')->name('loker-tampil')->middleware('auth');
Route::get('/loker2', 'LokerController@lokertampil2')->name('loker-tampil2');
Route::get('/filter-loker', 'LokerController@filterLoker')->name('filter-loker')->middleware('auth');
Route::get('/filter-loker2', 'LokerController@filterLoker2')->name('filter-loker2');

//Route apply loker
Route::get('/apply-loker', 'ApplyController@index')->name('apply-loker-view')->middleware('auth');
Route::post('/apply-loker', 'ApplyController@apply')->name('apply-loker')->middleware('auth');

//Route untuk Data Home
Route::get('/home', [HomeController::class,'index'])->middleware('auth:web')->name('home');

//Route untuk Register Page
Route::get('/register', 'RegisterController@index')->name('register');
Route::post('/register', 'RegisterController@store');

//Route untuk Login Page (localhost:8000/login)
Route::get('/login', 'LoginController@index')->middleware('guest')->name('login'); 
Route::post('/login', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');

//Route untuk Data Apply
Route::get('/justapply', 'HistoryApplyController@history1tampil')->middleware('auth');

//Route untuk Data Administration
Route::get('/administration', 'HistoryAdministrationController@history2tampil')->middleware('auth');


//Route untuk Data Interview
Route::get('/interview', 'HistoryInterviewController@history3tampil')->middleware('auth');

//Route untuk Halaman Likes
Route::get ('/likes', 'LikesController@likestampil')->middleware('auth');
Route::post('/like-loker/{idloker}', 'LikesController@likeLoker')->name('like-loker')->middleware('auth');
