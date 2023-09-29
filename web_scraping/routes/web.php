<?php

use App\Http\Controllers\WebSappingController;
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
Route::get('/web-srap', [WebSappingController::class, 'scrapeNews']);
Route::get('/show_image', [WebSappingController::class, 'show_images']);
