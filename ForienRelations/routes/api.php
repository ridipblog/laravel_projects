<?php

use App\Http\Controllers\StduentRegistrationController;
use App\Http\Controllers\WritterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add-writter', [WritterController::class, 'addWritter']);

Route::post('add-student', [StduentRegistrationController::class, 'addStudent']);
