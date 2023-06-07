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


Route::get('/','AuthController@login')->name('login');
Route::post('login','AuthController@check')->name('auth.check');
Route::get('register','AuthController@register')->name('auth.register');
Route::post('register','AuthController@store')->name('auth.store');
Route::get('logout','AuthController@logout')->name('auth.logout');

Route::get('dashboard','DashboardController@home')->name('dashboard.home')->middleware('auth');
