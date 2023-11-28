<?php

use App\Http\Controllers\PhonePayController;
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
Route::get('phonepe', [PhonePayController::class, 'phonepe']);
Route::any('phonepe-response', [PhonePayController::class, 'response'])->name('response');
