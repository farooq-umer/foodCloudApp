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

// Form Types
Route::get('/form_types', 'FormsController@index')->name('show_form_types')->middleware('auth');
Route::get('/form_types/create', 'FormsController@create')->name('show_create_form_type')->middleware('auth');
Route::get('/form_types/{form}', 'FormsController@show')->name('show_form_type')->middleware('auth');
Route::post('/form_types', 'FormsController@store')->name('create_form_type')->middleware('auth');
Route::get('/form_types/{form}/edit', 'FormsController@edit')->name('show_edit_form_type')->middleware('auth');
Route::patch('/form_types/{form}', 'FormsController@update')->name('update_form_type')->middleware('auth');
Route::delete('/form_types/{form}', 'FormsController@destroy')->name('delete_form_type')->middleware('auth');

// Forms
//Route::resource('forms', 'FormsController')->name('index','forms')->middleware('auth');
Route::get('/forms', 'FormsController@index')->name('show_forms')->middleware('auth');
Route::get('/forms/create', 'FormsController@create')->name('show_create_form')->middleware('auth');
Route::get('/forms/{form}', 'FormsController@show')->name('show_form')->middleware('auth');
Route::post('/forms', 'FormsController@store')->name('create_form')->middleware('auth');
Route::get('/forms/{form}/edit', 'FormsController@edit')->name('show_edit_form')->middleware('auth');
Route::patch('/forms/{form}', 'FormsController@update')->name('update_form')->middleware('auth');
Route::delete('/forms/{form}', 'FormsController@destroy')->name('delete_form')->middleware('auth');

