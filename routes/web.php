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
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Form Types
//Route::resource('form_types', 'FormTypesController')->name('index','show_form_types')->middleware('auth');
Route::get('/form_types', 'FormTypesController@index')->name('show_form_types');
Route::get('/form_types/create', 'FormTypesController@create')->name('show_create_form_type');
Route::get('/form_types/{form}', 'FormTypesController@show')->name('show_form_type');
Route::post('/form_types', 'FormTypesController@store')->name('create_form_type');
Route::get('/form_types/{form}/edit', 'FormTypesController@edit')->name('show_edit_form_type');
Route::patch('/form_types/{form}', 'FormTypesController@update')->name('update_form_type');
Route::delete('/form_types/{form}', 'FormTypesController@destroy')->name('delete_form_type');

// Forms
//Route::resource('forms', 'FormsController')->name('index','show_forms')->middleware('auth');
Route::get('/forms', 'FormsController@index')->name('show_forms');
Route::get('/forms/create', 'FormsController@create')->name('show_create_form');
Route::get('/forms/{form}', 'FormsController@show')->name('show_form');
Route::post('/forms', 'FormsController@store')->name('create_form');
Route::get('/forms/{form}/edit', 'FormsController@edit')->name('show_edit_form');
Route::patch('/forms/{form}', 'FormsController@update')->name('update_form');
Route::delete('/forms/{form}', 'FormsController@destroy')->name('delete_form');

// Question Types
Route::get('/question_types', 'QuestionTypesController@index')->name('show_question_types');
Route::get('/question_types/create', 'QuestionTypesController@create')->name('show_create_question_type');
Route::get('/question_types/{form}', 'QuestionTypesController@show')->name('show_question_type');
Route::post('/question_types', 'QuestionTypesController@store')->name('create_question_type');
Route::get('/question_types/{form}/edit', 'QuestionTypesController@edit')->name('show_edit_question_type');
Route::patch('/question_types/{form}', 'QuestionTypesController@update')->name('update_question_type');
Route::delete('/question_types/{form}', 'QuestionTypesController@destroy')->name('delete_question_type');

// Add Questions
Route::get('/add_questions', 'AddQuestionsController@index')->name('show_questionnaires_to_add_questions');
Route::get('/add_questions/{form}/create', 'AddQuestionsController@create')->name('add_questions_to_questionnaire');

//Route::get('/add_questions', 'AddQuestionsController@index')->name('show_forms_to_add_questions');
//Route::get('/add_questions/create', 'AddQuestionsController@create')->name('show_create_question');
//Route::get('/add_questions/{form}', 'AddQuestionsController@show')->name('show_question');
Route::post('/add_questions', 'AddQuestionsController@store')->name('add_new_question');
//Route::get('/add_questions/{form}/edit', 'AddQuestionsController@edit')->name('show_edit_question');
//Route::patch('/add_questions/{form}', 'AddQuestionsController@update')->name('update_question');
//Route::delete('/add_questions/{form}', 'AddQuestionsController@destroy')->name('delete_question');
