<?php

use App\Http\Controllers\APICallController;
use App\Http\Controllers\GenerateUniqueCode;
use App\Http\Controllers\RegistrationStudentController;
use App\Http\Controllers\ResetPasswordLinkController;
use App\Http\Controllers\SoftwareDeveloperController;
use App\Http\Controllers\WebDeveloperController;
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
Route::post('/validate', [GenerateUniqueCode::class, 'register']);
Route::get('/get-data', [APICallController::class, 'getData']);
Route::post('/post-data', [APICallController::class, 'postData']);

Route::post('add-student', [RegistrationStudentController::class, 'addStudent']);

// Add Software Developers
Route::get('/add-data', [SoftwareDeveloperController::class, 'addData']);
// Search By One Input
Route::post('/search-by-one-input', [SoftwareDeveloperController::class, 'searchByOneInput']);
Route::post('/search-by-one-input_2', [SoftwareDeveloperController::class, 'searchByOneInput_2']);

// Search By District Block GP
Route::post('/search-by-district-block-gp', [SoftwareDeveloperController::class, 'searchByDistrictBlockGP']);

// Callback And Commit With DB
Route::get('/db-transation', [WebDeveloperController::class, 'addData']);

// Reset Password With Link
Route::prefix('reset-password')->group(function () {
    Route::get('/add-data', [ResetPasswordLinkController::class, 'addData']);
    Route::post('/apply-link', [ResetPasswordLinkController::class, 'applyLink']);
    Route::post('/verify-link', [ResetPasswordLinkController::class, 'verifyLink']);
    Route::post('/login', [ResetPasswordLinkController::class, 'login']);
});
