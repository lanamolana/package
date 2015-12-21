<?php
Route::get("/laravel", 
	"Lana\Home\Http\Controllers\DefaultController@index");

//autentifikasi
Route::get('/auth/login', ['as'=>'user_auth_login',
	'uses'=>'Lana\User\Http\Controllers\SecurityController@formLogin']);
Route::post('/proses-login', ['as'=>'user_auth_proses',
	'uses'=>'Lana\User\Http\Controllers\SecurityController@prosesLogin']);
Route::get('/auth/logout', ['as'=>'user_auth_logout',
	'uses'=>'Lana\User\Http\Controllers\SecurityController@logout']);


//register user
Route::get("/user/register", "Lana\User\Http\Controllers\UserController@register");
Route::post("/user/regsimpan", "Lana\User\Http\Controllers\UserController@regsimpan");

//user
	Route::get("/user/{id}/edit", "Lana\User\Http\Controllers\UserController@formEdit");
	Route::post("/user/{id}/update", "Lana\User\Http\Controllers\UserController@update");
	Route::get("/user/{id}/delete", "Lana\User\Http\Controllers\UserController@delete");
	Route::get("/user", "Lana\User\Http\Controllers\UserController@index");
	Route::get("/account", "UserController@account");

?>