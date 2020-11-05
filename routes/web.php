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

Auth::routes();
// 宣言一覧画面を表示
Route::get('/', 'Auth\PostController@showTopPage')->name('top');

// 宣言詳細画面を表示
Route::get('/post/{id}', 'Auth\PostController@showDetail')->name('show');

Route::get('/home', 'HomeController@index')->name('home');

// 宣言登録画面
Route::get('/drafts/new', 'Auth\PostController@index')->name('drafts.new');

// 宣言登録
Route::post('/drafts/store', 'Auth\PostController@exeStore')->name('store');
