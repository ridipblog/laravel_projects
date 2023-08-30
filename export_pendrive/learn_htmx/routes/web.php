<?php

use Illuminate\Support\Facades\DB;
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
Route::get('/home', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/users', function () {
    $employes = DB::table('employes')->get();
    return view('/users', ['employes' => $employes]);
});
Route::get('/temp-related', function () {
    $employes = DB::table('employes')->get();
    return view('temp-related');
});
Route::get('/temp-related-get', function () {
    $employes = DB::table('employes')->get();
    $method = "ajax";
    return view('temp', ['employes' => $employes, 'method' => $method]);
});
