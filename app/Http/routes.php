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

Route::get('/', 'ConnectionController@Index');
Route::post('/connect', 'ConnectionController@SubmitConnect');
Route::post('/setLocale', 'ConnectionController@SetLocale');

Route::get('/home', 'RedisController@Index')->name('home');
Route::get('/add', 'RedisController@Add');
Route::get('/info', 'RedisController@Info');
Route::get('/disconnect', 'RedisController@Disconnect');
Route::post('/addSubmit', 'RedisController@AddSubmit');
Route::put('/editSubmit', 'RedisController@EditSubmit');
Route::delete('/delete', 'RedisController@Delete');
Route::get('/view/{key}', 'RedisController@View');


// Process String
Route::get('/string/view/{key}', 'Type\StringController@View');
Route::get('/string/edit/{key}', 'Type\StringController@EditIndex');
Route::put('/string/edit', 'Type\StringController@EditSubmit');
Route::delete('/string/delete', 'Type\StringController@Delete');

// Process List
Route::get('/list/view/{key}/{index}', 'Type\ListController@View');
Route::post('/list/add', 'Type\ListController@Add');
Route::get('/list/edit/{key}/{index}', 'Type\ListController@EditIndex');
Route::put('/list/edit', 'Type\ListController@EditSubmit');
Route::delete('/list/delete', 'Type\ListController@Delete');

// Process Hash
Route::get('/hash/view/{key}/{index}', 'Type\HashController@View');
Route::post('/hash/add', 'Type\HashController@Add');
Route::get('/hash/edit/{key}/{index}', 'Type\HashController@EditIndex');
Route::put('/hash/edit', 'Type\HashController@EditSubmit');
Route::delete('/hash/delete', 'Type\HashController@Delete');

// Process Set
Route::get('/set/view/{key}/{content}', 'Type\SetController@View');
Route::post('/set/add', 'Type\SetController@Add');
Route::delete('/set/delete', 'Type\SetController@Delete');

// Process ZSet
Route::get('/zset/view/{key}/{content}/{score}', 'Type\ZSetController@View');
Route::post('/zset/add', 'Type\ZSetController@Add');
Route::get('/zset/edit/{key}/{content}/{score}', 'Type\ZSetController@EditIndex');
Route::put('/zset/edit', 'Type\ZSetController@EditSubmit');
Route::delete('/zset/delete', 'Type\ZSetController@Delete');
