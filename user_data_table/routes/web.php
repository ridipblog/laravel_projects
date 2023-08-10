<?php

use App\Http\Controllers\EditTableController;
use App\Http\Controllers\ExportDataController;
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
Route::get('/display-data', [ExportDataController::class, 'export_show']);
Route::get('/show-edit-table', [EditTableController::class, 'show_edit_table']);
Route::get('/download-edit-table', [EditTableController::class, 'download_edit_table'])->name('download-file');
Route::get('/export-data', [ExportDataController::class, 'export'])->name('export.name');
