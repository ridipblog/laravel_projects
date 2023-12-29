<?php

use App\Http\Controllers\EmployeePDFController;
use App\Http\Controllers\MakePDFController;
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
Route::get('/view', [MakePDFController::class, 'export_pdf']);
Route::get('/export', [MakePDFController::class, 'createPDF']);
Route::get(
    '/add-data',
    [EmployeePDFController::class, 'addData']
);
Route::get('employee-export-pdf', [EmployeePDFController::class, 'employeePDFExport']);
