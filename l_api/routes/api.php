<?php

use App\Http\Controllers\TestAPIController;
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
Route::get('/employe', [TestAPIController::class, 'index']);
Route::post('/employe', [TestAPIController::class, 'store']);
Route::get('/employe/{id}', [TestAPIController::class, 'show']);
Route::put('/employe/{id}', [TestAPIController::class, 'update']);
Route::delete('/employe/{id}', [TestAPIController::class, 'delete']);
