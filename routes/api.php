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

Route::get('/reports', 'ReportController@index');
Route::post('/report', 'ReportController@store');
Route::put('/report/work-item', 'WorkItemController@store');
Route::delete('/report/work-item/{id}', 'WorkItemController@delete');
