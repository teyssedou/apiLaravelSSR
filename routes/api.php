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

/* ----- Route Api Rest ----- */
Route::get('/view', 'ApiController@view');

Route::post('/save/user/{userId}', 'ApiController@saveUser');
Route::post('/save/calendar/{userIdCalendar}', 'ApiController@saveCalendar');
Route::post('/save/treatment/{userIdTreatment}', 'ApiController@saveTreatment');

Route::delete('delete/user/{userId}', 'ApiController@deleteUser');
Route::delete('delete/calendar/{calendarId}', 'ApiController@deleteCalendar');
Route::delete('delete/treatment/{treatmentId}', 'ApiController@deleteTreatment');
