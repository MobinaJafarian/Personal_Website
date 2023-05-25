<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ApplicationTracker;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SkillController;
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
Route::get("/single/{id}", [FrontController::class, 'blogDetail'])->name('blog.detail');

Auth::routes();

Route::middleware('admin')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/home/home' , HomeController::class)->parameters(['home'=>'id']);
    Route::resource('home/about' , AboutController::class)->parameters(['about' => 'id']);
    Route::resource('home/skill' , SkillController::class)->parameters(['skill' => 'id']);
    Route::resource('home/blog' , BlogController::class)->parameters(['blog' => 'id']);
    Route::resource('home/applicationTracker' , ApplicationTracker::class)->parameters(['applicationTracker' => 'id']);
});
