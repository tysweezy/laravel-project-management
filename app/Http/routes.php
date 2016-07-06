<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/task/{id}', [
	'as'    => 'show-task',
	'uses'  => 'TaskController@show'
]);


// project routes
Route::get('project/create' , 'ProjectController@create');
Route::post('project/create', 'ProjectController@store');

Route::get('/project/{id}', [
	'as'    => 'show-project',
	'uses'  => 'ProjectController@show'
]);

Route::get('/project/{id}/edit', [
	'as'    => 'edit-project',
	'uses'  => 'ProjectController@edit'
]);


Route::post('/project/{id}/update', [
	'as'    => 'update-project',
	'uses'  => 'ProjectController@update'
]);


Route::get('/project/{id}/delete', [
	'as'    => 'delete-project',
	'uses'  => 'ProjectController@destroy'
]);


Route::get('/task/create', 'TaskController@create');
Route::post('/task/create', 'TaskController@store');


Route::get('/task/{id}/edit', [
	'as'   => 'edit-task',
	'uses' => 'TaskController@edit'
]);

Route::post('/task/{id}/update', [
	'as'   => 'update-task',
	'uses' => 'TaskController@update' 
]);

// wierd that GET request works 
Route::get('/task/{id}/delete', [
	'as'    => 'delete-task',
	'uses'  => 'TaskController@destroy'
]);