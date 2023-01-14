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
Route::view('register','register');
Route::view('login','login');
Route::post('registerUser','RestoController@registerUser');
Route::post('loginUser','RestoController@login');

Route::group(['middleware'=>'customAuth'],function(){
Route::get('/list','RestoController@list');
Route::view('/add','add');
Route::post('addResto','RestoController@addResto');
Route::view('register','register');
Route::view('login','login');
Route::get('logout','RestoController@logout');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
