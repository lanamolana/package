<?php

//autentifikasi
Route::get('/auth/login', ['as'=>'user_auth_login',
	'uses'=>'Lana\User\Http\Controllers\AuthController@loginForm']);
Route::post('/proses-login', ['as'=>'user_auth_proses',
	'uses'=>'Lana\User\Http\Controllers\AuthController@prosesLogin']);
Route::get('/auth/logout', ['as'=>'user_auth_logout',
	'uses'=>'Lana\User\Http\Controllers\AuthController@logout']);

//Must be login first!
Route::group(array('middleware'=>'auth'), function() {

	//Register petugas
	Route::get("/user/register", "Lana\User\Http\Controllers\UserController@create");
	Route::post("/user/store", "Lana\User\Http\Controllers\UserController@store");

	//User Management
	Route::get("/users", "Lana\User\Http\Controllers\UserController@index");
	Route::get("/user", "Lana\User\Http\Controllers\UserController@petugasUser");
	Route::get("/user/{id}/edit", "Lana\User\Http\Controllers\UserController@edit");
	Route::post("/user/{id}/update", "Lana\User\Http\Controllers\UserController@update");
	Route::get("/user/{id}/delete", "Lana\User\Http\Controllers\UserController@delete");

	//Profile Management
	Route::get("/petugas", "Lana\User\Http\Controllers\ProfileController@index");
	Route::get("/profile", "Lana\User\Http\Controllers\ProfileController@petugasProfile");
	Route::get("/profile/{id}", "Lana\User\Http\Controllers\ProfileController@show")->where("id", "\d+");
	Route::get("/profile/{id}/edit", "Lana\User\Http\Controllers\ProfileController@edit");
	Route::post("/profile/{id}/update", "Lana\User\Http\Controllers\ProfileController@update");
});
?>