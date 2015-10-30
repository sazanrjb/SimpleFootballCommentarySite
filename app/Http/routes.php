<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
//
//Route::get('home', 'HomeController@index');
Route::get('login','LoginController@index',['middleware'=>'guest']);
Route::get('logout','CommentaryController@logout');
Route::post('dologin','LoginController@dologin');

Route::get('/','CommentaryController@index');
Route::resource('/match','MatchController');
Route::resource('/commentary','CommentaryController');

Route::get('/getCommentary','CommentaryController@getCommentary');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


