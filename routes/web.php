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
Route::get('/form_types', 'FormTypesController@index')->name('show_form_types')->middleware('auth');
Route::get('/form_types/create', 'FormTypesController@create')->name('show_create_form_type')->middleware('auth');
Route::get('/form_types/{form}', 'FormTypesController@show')->name('show_form_type')->middleware('auth');
Route::post('/form_types', 'FormTypesController@store')->name('create_form_type')->middleware('auth');
Route::get('/form_types/{form}/edit', 'FormTypesController@edit')->name('show_edit_form_type')->middleware('auth');
Route::patch('/form_types/{form}', 'FormTypesController@update')->name('update_form_type')->middleware('auth');
Route::delete('/form_types/{form}', 'FormTypesController@destroy')->name('delete_form_type')->middleware('auth');

// Forms
//Route::resource('forms', 'FormsController')->name('index','show_forms')->middleware('auth');
Route::get('/forms', 'FormsController@index')->name('show_forms')->middleware('auth');
Route::get('/forms/create', 'FormsController@create')->name('show_create_form')->middleware('auth');
Route::get('/forms/{form}', 'FormsController@show')->name('show_form')->middleware('auth');
Route::post('/forms', 'FormsController@store')->name('create_form')->middleware('auth');
Route::get('/forms/{form}/edit', 'FormsController@edit')->name('show_edit_form')->middleware('auth');
Route::patch('/forms/{form}', 'FormsController@update')->name('update_form')->middleware('auth');
Route::delete('/forms/{form}', 'FormsController@destroy')->name('delete_form')->middleware('auth');

// Question Types
Route::get('/question_types', 'QuestionTypesController@index')->name('show_question_types')->middleware('auth');
Route::get('/question_types/create', 'QuestionTypesController@create')->name('show_create_question_type')->middleware('auth');
Route::get('/question_types/{form}', 'QuestionTypesController@show')->name('show_question_type')->middleware('auth');
Route::post('/question_types', 'QuestionTypesController@store')->name('create_question_type')->middleware('auth');
Route::get('/question_types/{form}/edit', 'QuestionTypesController@edit')->name('show_edit_question_type')->middleware('auth');
Route::patch('/question_types/{form}', 'QuestionTypesController@update')->name('update_question_type')->middleware('auth');
Route::delete('/question_types/{form}', 'QuestionTypesController@destroy')->name('delete_question_type')->middleware('auth');

// Add Questions
Route::get('/add_questions', 'AddQuestionsController@index')->name('show_questionnaires_to_add_questions')->middleware('auth');
Route::get('/add_questions/{form}/create', 'AddQuestionsController@create')->name('add_questions_to_questionnaire')->middleware('auth');

//Route::get('/Questionnaires', 'QuestionnairesController@index')->name('show_forms_to_add_questions')->middleware('auth');
//Route::get('/questions/create', 'QuestionsController@create')->name('show_create_question')->middleware('auth');
//Route::get('/questions/{form}', 'QuestionsController@show')->name('show_question')->middleware('auth');
Route::post('/add_questions', 'AddQuestionsController@store')->name('add_new_question')->middleware('auth');
//Route::get('/questions/{form}/edit', 'QuestionsController@edit')->name('show_edit_question')->middleware('auth');
//Route::patch('/questions/{form}', 'QuestionsController@update')->name('update_question')->middleware('auth');
//Route::delete('/questions/{form}', 'QuestionsController@destroy')->name('delete_question')->middleware('auth');
