<?php

use App\Http\Controllers\APICallController;
use App\Http\Controllers\GenerateUniqueCode;
use App\Http\Controllers\RegistrationStudentController;
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
Route::get(
    '/generate-unique-code',
    [GenerateUniqueCode::class, 'index']
);

Route::get('/api-hit', [APICallController::class, 'apiHit']);
