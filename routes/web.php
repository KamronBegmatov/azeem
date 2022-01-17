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
    return view('layout/default');
});
Route::get('/languages', function () {
    return view('/content/languages');
});
Route::get('/shahada', function () {
    return view('/content/shahada');
});
Route::get('/allahNames', function () {
    return view('/content/allahNames');
});
Route::get('/allahNamesTrans', function () {
    return view('/content/allahNamesTrans');
});
Route::get('/systemWords', function () {
    return view('/content/systemWords');
});
Route::get('/suraTrans', function () {
    return view('/content/suraTrans');
});
Route::get('/editLanguages', function () {
    return view('/content/edit');
});
Route::get('/createLanguages', function () {
    return view('/content/create');
});
