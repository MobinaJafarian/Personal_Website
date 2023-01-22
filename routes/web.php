<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/' ,[FrontController::class ,  'index'])->name('front');
// Route::get('/', function () {
//     return view('front.index');
// })->name('front');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/home/home' , HomeController::class)->parameters(['home'=>'id']);
Route::resource('home/about' , AboutController::class)->parameters(['about' => 'id']);