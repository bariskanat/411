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

App::instance("c",new C);





Route::get("register",array("as"=>"signup","uses"=>"UserController@create"));
Route::get("u/{user}",array("as"=>"userpage","uses"=>"UserController@getUser"));
Route::get("login",array("before"=>"guest","as"=>"login","uses"=>"SessionController@getlogin"));
Route::get("logout",array("before"=>"auth","as"=>"logout","uses"=>"SessionController@logout"));
Route::get('/',function(){
    return "hello world";
});





Route::post("register",array("before"=>"csrf","uses" => "UserController@store"));
Route::post("login",array("before"=>"guest","uses"=>"SessionController@postLogin"));
Route::post("searchlogin","UserController@search");

