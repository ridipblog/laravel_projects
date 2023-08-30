<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
Route::post('/clicked', function () {
    sleep(1);
    return view('test', ['name' => 'coder 1']);
});
Route::post('/contact', function (Request $request) {
    $name = $request->name;
    $email = $request->email;
    $check = true;
    $error = array();
    if (empty($name) || empty($email)) {
        $check = false;
        $error = array('Fill Name', 'Fill Email');
    } else {
        $check = false;
        $error = array('Send Successfully');
    }
    return view('contact-success', ['message' => $error, 'check' => $check]);
});
Route::post('/users', function (Request $request) {
    $name = $request->name;
    $email = $request->email;
    $check = true;
    $error = array();
    $users = array();
    if (empty($name) || empty($email)) {
        $check = false;
        $error = array('Fill Name', 'Fill Email');
    } else {
        $check = false;
        $users = DB::table('employes')->get();
    }
    return view('user-success', ['message' => $error, 'check' => $check, 'users' => $users]);
});
