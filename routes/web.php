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

Route::get('/',                        'Admin\LoginController@index');
Route::get('login',                    'Admin\LoginController@login');
Route::get('logout',                   'Admin\LoginController@logout');
Route::get('dashboard',                'Admin\LoginController@dashboard')->name('dashboard');
Route::post('login/attempt',           'Admin\LoginController@loginAttempt');

Route::resource('languages',         'Admin\LanguageController');
Route::resource('reciters',          'Admin\ReciterController');
Route::resource('reciter_langs',     'Admin\ReciterLangController');
Route::resource('sura_reciters',     'Admin\SuraReciterController');
Route::resource('system_words',      'Admin\SystemWordController');
Route::resource('allah_names',       'Admin\AllahNameController');
Route::resource('allah_name_langs',  'Admin\AllahNameLangController');
Route::resource('shahadas',          'Admin\ShahadaController');
Route::resource('select_from_lists', 'Admin\SelectFromListController');
Route::resource('styles',            'Admin\StyleController');

