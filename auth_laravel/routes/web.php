<?php

use App\Http\Controllers\ShowController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('show-user-auth', [ShowController::class, 'show_auth_user']);
Route::get('check-user-auth', [ShowController::class, 'check_auth_user']);
Route::get('report', [ShowController::class, 'report_page'])->middleware('auth');
Route::get('unauth', [ShowController::class, 'un_auth'])->name('unauth');
require __DIR__ . '/auth.php';
