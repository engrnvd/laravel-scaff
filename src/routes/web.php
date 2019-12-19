<?php

Route::view('/', 'naveed.scaff::pages.index.index');
Route::view('/crud', 'naveed.scaff::pages.crud.index');
Route::post('/gen-crud', function () {
    return request()->all();
});
