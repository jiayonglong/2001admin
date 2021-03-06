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
Route::any('/brand/json','AdminCategoryController@brandjson');

Route::get('/', function () {
    return view('welcome');
});

Route::any('/api/selected','Goods\GoodsController@selected');

Route::any('/category/json','AdminCategoryController@catrjson');
