<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
//     return view('event/index');
// });
Route::resource('event', EventController::class);
// Route::resource('event', 'EventController');
// Route::get('event', 'EventController@index')->name("event");
// Route::post('/customer', 'TestController@submit_customer_data')->name('customer.save');
// Route::get('/customer/list', 'TestController@fetch_all_customer')->name('customer.list');
// Route::get('/customer/edit/{customer}', 'TestController@edit_customer_form')->name('customer.edit');
// Route::patch('/customer/edit/{customer}', 'TestController@edit_customer_form_submit')->name('customer.update');
// Route::get('/customer/{customer}', 'TestController@view_single_customer')->name('customer.view');
// Route::delete('/customer/{customer}', 'TestController@delete_customer')->name('customer.delete');