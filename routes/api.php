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
Route::post('register',                   'Auth\AuthController@register');
Route::post('login',                      'Auth\AuthController@login');
Route::post('logout',                     'Auth\AuthController@logout');
Route::post('refresh',                    'Auth\AuthController@refresh');
Route::post('change_password',            'Auth\AuthController@changePassword');
Route::post('reset_password',             'Auth\PasswordResetController@resetPassword');
Route::post('update_password',            'Auth\UpdatePasswordController@updatePassword');
Route::get('me',                          'Auth\AuthController@me');
Route::get('redirect_google',             'Auth\UserFromSocialController@redirectGoogle');
Route::get('callback_google',             'Auth\UserFromSocialController@callbackGoogle');
Route::get('redirect_facebook',           'Auth\UserFromSocialController@redirectFacebook');
Route::get('callback_facebook',           'Auth\UserFromSocialController@callbackFacebook');
Route::get('redirect_twitter',            'Auth\UserFromSocialController@redirectTwitter');
Route::get('callback_twitter',            'Auth\UserFromSocialController@callbackTwitter');
//  FRONT
Route::get('languages',                   'Front\LanguageController@index');                // API for all pages
Route::get('system_words',                'Front\SystemWordController@index');              // API for all pages
Route::get('sura_langs',                  'Front\SuraLangController@index');                // API for 5-6 pages
Route::get('sura_langs/{sura}',           'Front\SuraLangController@show');                 // API for 7 page
Route::get('methods',                     'Front\MethodController@index');                  // API for getting methods of prayer times
Route::get('pray_times_by_month',         'Front\PrayerTimeController@index');              // API for 1-2 page
Route::get('pray_times_by_date',          'Front\PrayerTimeController@show');               // API for 1-2 page
Route::get('pray_times_by_city_month',    'Front\PrayerTimeByCityController@index');        // API for 1-2 page
Route::get('pray_times_by_city_date',     'Front\PrayerTimeByCityController@show');         // API for 1-2 page
Route::get('allah_names_langs',           'Front\AllahNameLangController@index');           // API for 18 page
Route::get('online_tv',                   'Front\OnlineTvController@index');                // API for online tv of Madina & Mekka
Route::get('shahada',                     'Front\ShahadaController@index');                 // API for shahada
Route::post('feedback',                   'Front\FeedbackController@send');                 // API for feedback
Route::get('select_from_lists',           'Front\SelectFromListController@index');          // API for madhab
Route::get('qazo',                        'Front\QazoController@show');                     // API for getting qazo of user
Route::put('qazo',                        'Front\QazoController@update');                   // API for updating qazo of user
Route::get('geo_code',                    'Front\GeoCodeController@getGeoCode');            // API for getting geocode
Route::get('reciter_langs',               'Front\ReciterLangController@index');            // API for getting reciters with translations
Route::get('reciter_langs/{reciter_lang}','Front\ReciterLangController@show');            // API for getting reciter with translation

// reciter_sura da audio ayat ham qoshishkere, keyin qazo, juz, sura_langs adminkada qilishkere
