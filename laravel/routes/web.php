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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PagesController@index');
Route::get('/costcenters','CostCentersController@index');
Route::get('/fundsources','FundSourcesController@index');
Route::get('/items','ItemsController@index');
Route::get('/purchaserequests','PurchaseRequestsController@index');
Route::get('/purchaserequests/create/{item}/{fundsources}/{costcenters}','PurchaseRequestsController@create');

Route::resource('purchaserequests', 'PurchaseRequestsController');
Route::resource('costcenters', 'CostCentersController');
Route::resource('fundsources', 'FundSourcesController');
Route::resource('items', 'ItemsController');
