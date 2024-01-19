<?php

use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\FormImportController;
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
Route::get('/excel-import', [ExcelImportController::class, 'import_view']);
Route::post('/import', [ExcelImportController::class, 'import']);
// Form Import As Excel
Route::get('/form-import-index', [FormImportController::class, 'index']);
Route::post('/form-import', [FormImportController::class, 'import']);
