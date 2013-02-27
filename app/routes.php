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

App::singleton("UserSession",function(){
    return new UserSession(new User);
});
Route::get("veli",function(){
    
});
Route::get('/',function(){
    return "hello world";
});

Route::get("register",array("as"=>"signup","uses"=>"UserController@create"));
Route::get("u/{user}",array("as"=>"userpage","uses"=>"UserController@getUser"));
Route::get("edit/{id}",array("before"=>"auth","as"=>"useredit","uses"=>"UserController@edit"));
Route::get("login",array("before"=>"guest","as"=>"login","uses"=>"SessionController@getlogin"));
Route::get("logout",array("before"=>"auth","as"=>"logout","uses"=>"SessionController@logout"));
Route::get("create/{id}",array("as"=>"createpage","uses" => "PageController@getCreate"));







Route::post("register",array("before"=>"csrf","uses" => "UserController@store"));

Route::post("login",array("before"=>"guest","uses"=>"SessionController@postLogin"));
Route::post("searchlogin","UserController@search");

