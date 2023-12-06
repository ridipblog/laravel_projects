<?php

use App\Http\Controllers\UploadImageController;
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
Route::post(
    '/upload-image',
    [UploadImageController::class, 'uploadImage']
);
Route::post('/get-image', [UploadImageController::class, 'getImage']);
Route::get('/get-params/', [UploadImageController::class, 'getParams']);
Route::get('/get-query/{name?}', [UploadImageController::class, 'getQuery']);
