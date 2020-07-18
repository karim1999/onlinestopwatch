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
    return view('index');
})->name('index');
Route::get('/timer', function () {
    return view('timer');
});
Route::get('/switch_language', 'ApiController@switch_language')->name('switch_language');
Route::get('/update_mode', 'ApiController@update_dark_mode_session');