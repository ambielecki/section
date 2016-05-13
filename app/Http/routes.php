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

Route::get('/', function () {
    return view('welcome');
});

//laravel's auth routes, see https://mattstauffer.co/blog/the-auth-scaffold-in-laravel-5-2 for a good explanation
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/roster/{team?}', 'BaseballController@getRoster');
Route::get('/test', 'BaseballController@getTest');

//routes restricted to logged in users
Route::group(['middleware'=>'auth'], function(){
    Route::get('/teams', 'BaseballController@getTeams');


    Route::get('/addplayer', 'BaseballController@getAddPlayer');
    Route::post('/addplayer', 'BaseballController@postAddPlayer');
});

Route::get('/layout', 'BaseballController@getLayout');