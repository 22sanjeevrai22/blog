<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('event', 'App\Http\Controllers\EventController@index')->name('event.index');

Route::get('event/create', function () {
    return view('event.create');
})->middleware('auth');

//Rout Parameter
Route::get('event/{event}/edit','App\Http\Controllers\EventController@edit')->name('event.edit');

//Route show
Route::get('event/{event}/show','App\Http\Controllers\EventController@show')->name('event.show');

//Route for Updating
Route::put('event/{event}/update','App\Http\Controllers\EventController@update')->name('event.update');

//Route for Deleting
Route::delete('event/{event}','App\Http\Controllers\EventController@delete')->name('event.delete');

//Route for Deleting Comment
Route::delete('comment/{comment}','App\Http\Controllers\CommentController@delete')->name('comment.delete');



//Route for saving Blog
Route::post('event/save','App\Http\Controllers\EventController@store')->name('event.save');

//Route for saving comment
Route::post('event/{event}/savecomment','App\Http\Controllers\CommentController@savecomment')->name('event.savecomment')->middleware('auth');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';