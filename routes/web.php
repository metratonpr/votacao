<?php

use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\SingerController;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\HomeController;
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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/votar', [HomeController::class, 'votar'])->name('votar');
Route::get('/obrigado', [HomeController::class, 'obrigado'])->name('obrigado');


Route::resource('singers', SingerController::class)->middleware('auth');
Route::resource('elections', ElectionController::class)->middleware('auth');
Route::resource('votes', VoteController::class)->middleware('auth');

