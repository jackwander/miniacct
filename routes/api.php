<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('user')->group(function() {
  Route::prefix('accounts')->group(function() {
    Route::post('/', 'AccountsController@index');
    Route::post('/store', 'AccountsController@store');
    Route::get('/{id}', 'AccountsController@show');
    Route::delete('/delete/{id}', 'AccountsController@destroy');
  });
});
