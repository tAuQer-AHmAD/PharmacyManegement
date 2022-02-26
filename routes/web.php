<?php

use Illuminate\Support\Facades\Route;
use App\Models\company;
use App\Http\Controllers\companyController;

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

Route::get('customer/add','App\Http\Controllers\customerController@create');
Route::post('customer/store', 'App\Http\Controllers\customerController@store')->name('customer.store');
Route::get('customer/read', 'App\Http\Controllers\customerController@read')->name('customer.read');
Route::get('customer/update/{id}', 'App\Http\Controllers\customerController@update');
Route::delete('/customer/read/{id}', 'App\Http\Controllers\customerController@destroy')->name('customer.destroy');
Route::post('/saveUpdatedData/{id}', 'App\Http\Controllers\customerController@saveUpdatedData')->name('saveUpdatedData');

//foe medicine routes
Route::get('medicine/add','App\Http\Controllers\medicineController@create');
Route::post('medicine/store', 'App\Http\Controllers\medicineController@store')->name('medicine.store');
Route::get('medicine/read', 'App\Http\Controllers\medicineController@read')->name('medicine.read');
Route::get('medicine/update/{id}', 'App\Http\Controllers\medicineController@update');
Route::post('/saveUpdatedData/{id}', 'App\Http\Controllers\medicineController@saveUpdatedData')->name('saveUpdatedData');
//FOR COMPANY TABLE ROUTES
Route::get('company/add','App\Http\Controllers\companyController@create');
Route::post('company/store', 'App\Http\Controllers\companyController@store')->name('company.store');
Route::get('company/read', 'App\Http\Controllers\companyController@read')->name('company.read');
Route::get('company/update/{id}', 'App\Http\Controllers\companyController@update');
Route::delete('/company/read/{id}', 'App\Http\Controllers\companyController@destroy')->name('company.destroy');
Route::post('/saveUpdatedData/{id}', 'App\Http\Controllers\companyController@saveUpdatedData')->name('saveUpdatedData');


//sales routes

Route::get('sale/add','App\Http\Controllers\saleController@create');
Route::post('sale/store', 'App\Http\Controllers\saleController@store')->name('sale.store');
Route::get('sale/read', 'App\Http\Controllers\saleController@read')->name('sale.read');
Route::get('sale/update/{id}', 'App\Http\Controllers\saleController@update');
Route::post('/saveUpdatedData/{id}', 'App\Http\Controllers\saleController@saveUpdatedData')->name('saveUpdatedData');
Route::delete('/sale/read/{id}', 'App\Http\Controllers\saleController@destroy')->name('sale.destroy');


//FOR UPLOAD ADN DEL FILE
Route::resource('shoes', 'App\Http\Controllers\ShoesControlle');
Route::get('shoes/{uuid}/download', 'App\Http\Controllers\ShoesControlle@download')->name('shoes.download');
Route::get('shoes/{uuid}/delete', 'App\Http\Controllers\ShoesControlle@delete')->name('shoes.delete');