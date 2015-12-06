<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'CoursesController@viewallcourses');
Route::get('/admin/addpost', 'PostsController@addpost');
Route::post('/admin/addpost', 'PostsController@savepost');
Route::get('/admin/addcourse', 'CoursesController@addcourse');
Route::post('/admin/addcourse', 'CoursesController@savecourse');
Route::get('/admin/addanswer/{postid}', 'AnswersController@addanswer');
Route::post('/admin/addanswer/{postid}', 'AnswersController@saveanswer');
Route::get('/course/{courseid}', 'CoursesController@viewcourse');
Route::get('post/{postid}', 'PostsController@viewpost');
