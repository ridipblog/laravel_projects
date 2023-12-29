<?php

use App\Http\Controllers\TeacherController;
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

// Teacher Routes
Route::post('teacher-login', [TeacherController::class, 'teacherLogin']);
Route::middleware('auth:teacher_api')->group(function () {
    Route::post('teacher-profile', [TeacherController::class, 'teacherProfile']);
});
