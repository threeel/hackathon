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


// Get Active WorkSpace
Route::middleware('auth:api')->get('/workspace','DataBubbleController@index');

// Create a Workspace only one
Route::middleware('auth:api')->post('/workspace','DataBubbleController@store');

// Get Urls for enviroment
Route::middleware('auth:api')->get('/workspace/urls','DataBubbleController@urls');

// Upload files
Route::middleware('auth:api')->post('/workspace/files','DataBubbleFilesController@post');

// Remove File
Route::middleware('auth:api')->delete('/workspace/files','');


