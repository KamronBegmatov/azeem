<?php

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
Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/widgets', function () {
    return view('widgets');
});
Route::get('/tables/simple', function () {
    return view('tables/simple');
});
Route::get('/tables/data', function () {
    return view('tables/data');
});
Route::get('/tables/jsgrid', function () {
    return view('tables/simple');
})->name("jsgrid");
