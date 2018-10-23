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
    Route::get('/{slug}', 'AccountsController@index');
    Route::post('/store', 'AccountsController@store');
    Route::get('/at/{id}', 'AccountsController@show');
    Route::put('/at/{id}', 'AccountsController@update');
    Route::delete('/delete/{id}', 'AccountsController@destroy');

    Route::prefix('transactions')->group(function() {
      Route::post('/', 'AccountTransactionsController@index');
      Route::post('/store', 'AccountTransactionsController@store');
    });

  });
});
