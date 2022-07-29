<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TaskController');
Route::resource('task', 'TaskController')->only(['index', 'store', 'update', 'destroy']);
Route::post('/updateTaskStatus/{id}', 'TaskController@updateTaskStatus');
