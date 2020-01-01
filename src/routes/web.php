<?php

Route::get('/', 'HomeController@index');
//Route::view('/', 'naveed.scaff::pages.index.index');
Route::view('/crud', 'naveed.scaff::pages.crud.index');
Route::post('/gen-crud', 'HomeController@generateCrud');
Route::get('/load-definition', 'HomeController@getDefinition');
