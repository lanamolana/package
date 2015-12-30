<?php

//Guest's Pages
Route::get("/contact", "Lana\User\Http\Controllers\ProfileController@contact");
Route::get("/listbooks", "Lana\Peminjaman\Http\Controllers\BukuController@show");

//Register Mahasiswa
Route::get("/mhs/register", "Lana\Peminjaman\Http\Controllers\MhsController@create");
Route::post("/mhs/store", "Lana\Peminjaman\Http\Controllers\MhsController@store");

//Must be login first!
Route::group(array('middleware'=>'auth'), function() {

	//Member Management
	Route::get("/members", "Lana\Peminjaman\Http\Controllers\MhsController@index");
	Route::get("/members/{id}", "Lana\Peminjaman\Http\Controllers\MhsController@show")->where("id", "\d+");
	Route::get("/members/{id}/edit", "Lana\Peminjaman\Http\Controllers\MhsController@edit");
	Route::post("/members/{id}/update", "Lana\Peminjaman\Http\Controllers\MhsController@update");
	Route::get("/members/{id}/delete", "Lana\Peminjaman\Http\Controllers\MhsController@delete");
	Route::get("/members/{id}/pinjam", "Lana\Peminjaman\Http\Controllers\MhsController@pinjam");
	Route::post("/members/{id}/prosespinjam", "Lana\Peminjaman\Http\Controllers\MhsController@prosesPinjam");

	//Buku Management
	Route::get("/books", "Lana\Peminjaman\Http\Controllers\BukuController@index");
	Route::get("/book/create", "Lana\Peminjaman\Http\Controllers\BukuController@create");
	Route::post("/book/store", "Lana\Peminjaman\Http\Controllers\BukuController@store");
	Route::get("/books/{id}/edit", "Lana\Peminjaman\Http\Controllers\BukuController@edit");
	Route::post("/books/{id}/update", "Lana\Peminjaman\Http\Controllers\BukuController@update");
	Route::get("/books/{id}/delete", "Lana\Peminjaman\Http\Controllers\BukuController@delete");
});
?>