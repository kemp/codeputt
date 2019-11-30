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

Route::get('/', function() {
    $questions = \App\Question::latest()->get();

    return view('question.index', compact('questions'));
});

Auth::routes();

Route::get('/profile', 'ProfileController@show');

Route::resource('questions', 'QuestionController');

// API resource: Not directly accessed
Route::resource('questions/{question}/answers', 'AnswerController');
