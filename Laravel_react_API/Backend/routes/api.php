<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Admin Login

Route::post('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Employe Login

Route::post('/employe_register', [EmployeController::class, 'register']);
Route::post('/employe_login', [EmployeController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/dashbaord', [LoginController::class, 'dashbaord']);
});
Route::middleware('auth:employe_api')->group(function () {
    Route::get('/employe_dashboard', [EmployeController::class, 'dashbaord']);
});
