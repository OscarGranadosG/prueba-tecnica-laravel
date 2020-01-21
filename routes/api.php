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

Route::get('health', function() {
    return response()->json(['status' => 'ok'])
        ->setStatusCode(200);
});

Route::group(['prefix' => 'v1'], function(){
    Route::get('cashier/balance', 'Pos\PosController@getOpenPos');
    Route::post('cashier/balance/open/day', 'Pos\PosController@saveOpenPos');
    Route::get('has/open/cashier/balance', 'Pos\PosController@getClosePos');
    Route::post('cashier/balance/close/day', 'Pos\PosController@saveClosePos');
});
