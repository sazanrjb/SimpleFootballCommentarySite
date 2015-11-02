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

Route::get('/setrunning/{id}','MatchController@setRunning');
Route::get('/closematch/{id}','MatchController@closeMatch');
Route::get('/match_detail/{id}','MatchController@matchDetail');
Route::get('/edit_details/{id}','MatchController@editDetail');
Route::post('/update_detail/{id}','MatchController@update_detail');
Route::post('/search','MatchController@search');
Route::get('/logout','MatchController@logout');
Route::resource('/match','MatchController');

Route::get('/users','UserController@index');
Route::get('/getusers','UserController@getUsers');
Route::post('/insertuser','UserController@insertUser');
Route::post('/updateuser','UserController@updateUser');
Route::post('/deleteuser','UserController@deleteUser');

Route::get('/','CommentaryController@index');
Route::resource('/commentary','CommentaryController');
Route::get('/getCommentary','CommentaryController@getCommentary');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


