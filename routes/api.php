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

//  AUTH
Route::post('register',      'AuthController@register');
Route::prefix('auth')->group(function () {
    Route::post('login',      'AuthController@login');
    Route::post('logout',     'AuthController@logout');
    Route::post('refresh',    'AuthController@refresh');
    Route::get('me',          'AuthController@me');
    Route::post('change_password','AuthController@changePassword');
    Route::post('reset_password','PasswordResetController@resetPassword');
    Route::post('update_password','UpdatePasswordController@updatePassword');
});
//  FRONT
Route::prefix('front')->group(function () {
    Route::get('system_words', 'Front\SystemWordController@index');           // API for all pages
    Route::get('sura_langs','Front\SuraLangController@index');                // API for 5-6 pages
    Route::get('sura_langs/{sura}','Front\SuraLangController@show');          // API for 7 page
    Route::get('pray_times_by_month','Front\PrayerTimeController@index');     // API for 1-2 page
    Route::get('pray_times_by_date','Front\PrayerTimeController@show');       // API for 1-2 page
    Route::get('allah_names_langs', 'Front\AllahNameLangController@index');   // API for 18 page
    Route::get('online_tv', 'Front\OnlineTvController@index');                // API for 16-17 page
    Route::get('shahada', 'Front\ShahadaController@index');                   // API for 19 page
    Route::post('feedback', 'Front\FeedbackController@send');                 // API for 22 page
});
