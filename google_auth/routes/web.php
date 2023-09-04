<?php

use App\Http\Controllers\GoogleController;
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
Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('login');
Route::any('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
Route::get('home', [GoogleController::class, 'home'])->name('home');
// Route::get('home', function () {
//     return view('home');
// })->name('home');
