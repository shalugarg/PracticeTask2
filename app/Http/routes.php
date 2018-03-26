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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FeedbackController@index');
Route:post('feedback',['uses'=>'FeedbackController@store','as'=>'feedback']);
Route::get('feedbacksuccess',['uses'=>'FeedbackController@success','as'=>'feedbacksuccess']);
Route::get('/admin/feedback/list',['uses'=>'FeedbackController@list','as'=>'feedbacklist']);
Route::post('/admin/feedback/export',['uses'=>'FeedbackController@export','as'=>'feedbackexport']);
