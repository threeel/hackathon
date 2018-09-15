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
})->name('landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('workspace','DataBubbleController@index');
Route::post('workspace','DataBubbleController@store')->name('workspace.create');
Route::post('workspace/files','DataBubbleFilesController@post')->name('workspace.files');


Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
