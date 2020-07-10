<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Vendor\UniSharp\LaravelFilemanager\Lfm;

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

Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::post('/home', 'PertanyaanController@store');

Route::get('pertanyaan/{id}', 'PertanyaanController@show')->name('index_pertanyaan');
Route::post('pertanyaan/{id}', 'JawabanController@store');

Route::get('/detail-pertanyaan', 'PertanyaanController@user_only');
Route::get('/detail-pertanyaan/{id}', 'PertanyaanController@detail');
Route::get('/detail-pertanyaan/{id}/edit','PertanyaanController@edit');
Route::put('/detail-pertanyaan/{id}', 'PertanyaanController@update');
Route::delete('/detail-pertanyaan/{id}','PertanyaanController@delete');

//Route library laravel-filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    'Lfm::routes()';
});
