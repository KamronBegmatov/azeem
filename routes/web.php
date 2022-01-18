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

Route::post('/login/attempt', 'Admin\LoginController@login')->name('login');

Route::get('/dashboard', function () {
    return view('layout/default');
})->name('dashboard');

// should make it with middleware later, don't forget
//Route::prefix('admin')->middleware('auth:api')->group(function () {
Route::resource('languages', 'Admin\LanguageController');
Route::resource('reciters', 'Admin\ReciterController');
Route::resource('sura_reciters', 'Admin\SuraReciterController');
Route::resource('system_words', 'Admin\SystemWordController');
Route::resource('allah_names', 'Admin\AllahNameController');
Route::resource('allah_names_langs', 'Admin\AllahNameLangController');
Route::resource('shahada', 'Admin\ShahadaController');
