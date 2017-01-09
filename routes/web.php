<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/****Shows Add Product***/
Route::get('/admin/add', 'AddProductController@add');

/****When the following route is being post to - do the added method****/
Route::post('/admin/add/added', 'AddProductController@added');

/****When all products a being shown via admin****/
Route::get('/admin/all', 'ViewAllController@all');   


/****When a product is being edit via html via admin****/
Route::get('/admin/{product}/edit', 'EditProductController@edit');

/****When a product is being updated via admin****/
Route::patch('/admin/{product}', 'EditProductController@update');

/****When a product is being deleted via admin****/
Route::get('/admin/{product}/delete', 'EditProductController@delete');










