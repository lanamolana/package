<?php

//Landing
Route::get("/pflana", function() {
	return view('LanaHome::index');
});

//Construct
Route::get("/home", "Lana\Home\Http\Controllers\HomeController@index");

//middleware
Route::group(array('middleware'=>'auth'), function() {
	
	Route::get('/success', function() {
		return view('LanaHome::info.success');
	});
});


//info
Route::get('/abort', function() {
	return view('LanaHome::info.abort');
});
Route::get('/escape', function() {
	return view('LanaHome::info.escape');
});
Route::get('/registered', function() {
	return view('LanaHome::info.registered');
});