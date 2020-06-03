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
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question', 'HomeController@question')->name('question');
Route::get('/usermanager', 'HomeController@usermanager')->name('usermanager');

Route::prefix('/user')->middleware('can:act-user')->group(function(){
	
	Route::get('/', 'UserController@index');
	Route::get('/create', 'UserController@create');
	Route::get('/search', 'UserController@search');

});
Route::group(['prefix' => 'transcripts'], function () {
	// echo "ok";
	Route::get('/search', 'TranscriptController@search')->name('search_tran');
	Route::get('/export', 'TranscriptController@export')->name('export.transcripts');
	Route::post('/import', 'TranscriptController@import')->name('import.transcripts');
	Route::post('/destroy_some','TranscriptController@destroy_some')->name('destroy_some');
	Route::get('/destroy_all','TranscriptController@destroy_all')->name('destroy_all');
});
Route::resource('transcripts', 'TranscriptController');
Route::get('/profile',function(){
	return view('profile');
})->name('profile');
Route::get('file',function(){
	return view('file');
});
Route::get('texx',function(){
	echo "ok";
});
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
// 	\UniSharp\LaravelFilemanager\Lfm::routes();
// });