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

Route::get('/','HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::get('/admin-dasboard','AdminController@index');
Route::get('/admin-dasboard-job','AdminController@joblist');
Route::get('/admin-dasboard-category','AdminController@categorylist');
Route::get('/admin-dasboard-report','AdminController@report');

//User
Route::resource('/user-profile','ProfileController');
Route::get('/job-blog','HomeController@job');
Route::get('/job-detail/{id}','HomeController@jobDetail');
Route::get('/user-report','HomeController@report');

//Job User
Route::resource('/job-user','JobUserController');
Route::get('/user-job-blog','HomeController@Jobuser');
//category
Route::resource('/category','CategoryController');

//job
Route::resource('/job','JobsController');

//resume
Route::resource('/resume','ResumeController');

//comment
Route::resource('/comment','CommentController');

//report
Route::post('/report','ReportController@create');


