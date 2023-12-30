<?php

use App\Http\Controllers\AdminController;
use App\Models\AdminModel;
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
// Admin Routes
Route::get('/admin-login', [AdminController::class, 'index']);
Route::post('/admin-login', [AdminController::class, 'login']);
Route::get('admin-profile', [AdminController::class, 'adminProfile']);
