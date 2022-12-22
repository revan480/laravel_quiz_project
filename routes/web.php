<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::post('/login', 'App\Http\Controllers\Login@check');

Route::get('/', 'App\Http\Controllers\Login@index')->name('login');

// If user is logged in, do not let him go back to login page
Route::group(['middleware' => 'auth'], function () {
    Route::get('/welcome', function () {
        // Question
        $questions = \App\Models\Question::all();
        return view('welcome')->with('questions', $questions);
    });
    
    Route::get('/create', function () {
        return view('create_question');
    });

    Route::post('/questions', 'App\Http\Controllers\Question@create');
});

Route::get('/questions', 'QuestionController@index')->name('questions.index');
//add type of question to database

Route::get ('/questions/{id}', 'App\Http\Controllers\Question@type')->name('questions.type');

//add answer options to database
Route::get ('/questions/{id}', 'App\Http\Controllers\Question@option')->name('questions.option');

// add option label
// Route::get ('/questions/{id}', 'App\Http\Controllers\Question@option_label')->name('questions.option_label');

// Delete question from database
Route::post('/questions/{id}/delete', 'App\Http\Controllers\Question@delete');

// Edit question from database
Route::get('/questions/{id}/edit', 'App\Http\Controllers\Question@edit');

// Update question from database
Route::put('/questions/{id}', 'App\Http\Controllers\Question@update');

// logout user from database and redirect to login page
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
