<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::controller('user', 'UserController');

Route::get("register",array("as"=>"signup","uses"=>"UserController@create"));
Route::get("u/{user}",array("as"=>"userpage","uses"=>"UserController@show"));
Route::get("login",array("before"=>"guest","as"=>"login","uses"=>"UserController@login"));
Route::get("logout",array("before"=>"auth","as"=>"login","uses"=>"UserController@logout"));
//Route::get("register",array("as"=>"signup","uses"=>"UserController@create"));
//Route::resource("user","UserController");

//Route::get("user","UserController@index");



Route::post("register",array("before"=>"csrf","uses" => "UserController@store"));
Route::post("login",array("before"=>"guest","uses"=>"UserController@postLogin"));



Route::get('/', function()
{
	return View::make('hello');
});