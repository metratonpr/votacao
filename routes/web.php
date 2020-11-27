<?php

use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\SingerController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\VoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sandbox;
use App\Http\Controllers\SubscriptionPageController;
use App\Models\Admin\Subscription;
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


Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/votar', [HomeController::class, 'votar'])->name('votar');
Route::get('/obrigado', [HomeController::class, 'obrigado'])->name('obrigado');


Route::resource('singers', SingerController::class)->middleware('auth');
Route::resource('elections', ElectionController::class)->middleware('auth');
Route::resource('votes', VoteController::class)->middleware('auth');
Route::resource('styles', StyleController::class)->middleware('auth');
Route::resource('subscriptions', SubscriptionController::class)->middleware('auth');
Route::resource('subscriptionspage', SubscriptionPageController::class);




