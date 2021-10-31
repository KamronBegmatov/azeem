<?php

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

//  ONLY ADMINS
Route::prefix('admin')->group(function () {
    Route::resource('languages',     'Admin\LanguageController');
    Route::resource('reciters',      'Admin\ReciterController');
    Route::resource('sura_reciters','Admin\SuraReciterController');
});

Route::prefix('front')->group(function () {
    Route::get('sura_langs','Front\SuraLangController@index'); // API for 5-6 pages
    Route::get('sura_langs/{sura}','Front\SuraLangController@show'); // API for 7-page
});
