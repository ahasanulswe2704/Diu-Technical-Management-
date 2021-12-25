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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/student', function () {
    return view('student.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/department', function () {
    return view('department.index');
});

Route::resource('createcomplain', 'ComplaincreateController');

//Route::post('createcomplain/update', 'ComplaincreateController@update')->name('createcomplain.update');

Route::get('createcomplain/destroy/{id}', 'ComplaincreateController@destroy');

//..Admin Dashboard
Route::resource('complainrequest', 'AdminController');

//Route::post('complainrequest/update', 'AdminController@update')->name('complainrequest.update');

Route::get('complainrequest/destroy/{id}', 'AdminController@destroy');

//..Department Dashboard
Route::resource('complainlist', 'DepartmentController');

//Route::post('complainrequest/update', 'AdminController@update')->name('complainrequest.update');

Route::get('complainlist/destroy/{id}', 'DepartmentController@destroy');


