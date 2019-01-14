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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('size/search/student', 'SizeController@searchStudent')->name('ukuran.siswa');
// Route::get('order/search/student', 'OrderController@searchStudent')->name('order.student');
Route::get('order/get/last_id', 'OrderController@lastId')->name('order.lastId');