<?php

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

Auth::routes();

Route::get('/', 'PageController@index')->name('dashboard');

Route::prefix('accounts')->group(function() {
  Route::get('/', 'PageController@accounts')->name('show.accounts');
  Route::get('/{slug}/', 'PageController@viewAccount')->name('view.account');
});
