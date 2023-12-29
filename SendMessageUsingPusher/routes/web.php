<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ShowAllUserMessageController;
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
// All User Message Display 
Route::get('/all-user-message', [ShowAllUserMessageController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Login Routes 
Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'store']);
// Registration Routes
Route::get('register', [RegistrationController::class, 'index']);
Route::post('register', [RegistrationController::class, 'store']);
// Profile Routes
Route::get('/person-profile', [PersonProfileController::class, 'index']);
