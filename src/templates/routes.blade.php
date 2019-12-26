<?php
/* @var $table \Naveed\Scaff\Helpers\Table */
/* @var $gen \Naveed\Scaff\Generators\ModelGenerator */
?>

Route::resource('{{$table->camel()}}', '{{$table->studly(true)}}Controller');
Route::post('/{{$table->camel()}}/bulk-edit', '{{$table->studly(true)}}Controller@bulkEdit');
Route::post('/{{$table->camel()}}/bulk-delete', '{{$table->studly(true)}}Controller@bulkDelete');
