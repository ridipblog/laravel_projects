<?php

use App\Http\Controllers\ManualDatableController;
use App\Http\Controllers\PracticDatatableServerController;
use App\Http\Controllers\PracticDattableController;
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
// -----------------DataTable with ajax Pratic -------------------
Route::get('/datatable-add', [PracticDattableController::class, 'addData']);
Route::get('/load-page-with-ajax', [PracticDattableController::class, 'index']);
Route::get('/get-data-with-ajax', [PracticDattableController::class, 'getData']);
// -----------------DataTable with Server Pratic -------------------

Route::get('/load-data-with-server', [PracticDatatableServerController::class, 'index']);
Route::get('/get-data-with-server', [PracticDatatableServerController::class, 'getData']);

// -----------------Manual Datatbale  -------------------
Route::get('/manual-datatbale-load', [ManualDatableController::class, 'index']);
Route::get('/load-manual-data', [ManualDatableController::class, 'loadData']);
Route::get('/load-page-manual-data', [ManualDatableController::class, 'loadPageData']);
Route::get('/search-manual-data', [ManualDatableController::class, 'searchData']);
