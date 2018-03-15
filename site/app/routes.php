<?php

Route::get('/logout', function(){
	Auth::logout();
	return Redirect::to('/');
});	

Route::get('/','UserController@login');
Route::post('/login','UserController@postLogin');

Route::group(['before' => 'auth'], function () {
	Route::get('/dashboard','AdminController@dashboard');
	Route::get('/sales','AdminController@sales');
	Route::get('/upload-file','AdminController@uploadFile');
	Route::post('/upload-file','AdminController@postUploadFile');
});