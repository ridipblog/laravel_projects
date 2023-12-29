<?php

use App\Http\Controllers\HasOneThroughController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\OneToOneController;
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

// One To One Relationship
Route::get('/one-to-one-example1', [OneToOneController::class, 'create_example_1']);
Route::get('/one-to-one-example2', [OneToOneController::class, 'create_example_2']);
Route::get('/one-to-one-example3', [OneToOneController::class, 'read_data_example1']);
Route::get('/one-to-one-example4', [OneToOneController::class, 'read_data_example2']);
// One To Many Relationship
Route::get('/one-to-many-relationship', [OneToManyController::class, 'create_example_1']);
Route::get('/one-to-many-example2', [OneToManyController::class, 'read_data_example1']);
// Has One Through
Route::get('/has-one-through-example1', [HasOneThroughController::class, 'create_example_1']);
Route::get('/has-one-through-example2', [HasOneThroughController::class, 'show_owner']);
Route::get('/has-one-through-example3', [HasOneThroughController::class, 'show_machenic']);
Route::get('/has-one-through-example4', [HasOneThroughController::class, 'show_car']);
