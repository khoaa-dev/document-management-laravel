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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Client\HomeController@index');

Route::get('/home', 'Client\HomeController@index')->name('home');

Route::get('/login', 'Client\HomeController@loginView')->name('loginView');

Route::post('/login', 'Auth\LoginController@postLogin')->name('login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/docs', 'Client\DocsController@vanBanDen')->name('come-docs-management');

Route::get('/docs/create', 'Client\ComeDocsController@create')->name('create-come-docs');

Route::get('/outdocs', 'Client\DocsController@vanBanDi')->name('out-docs-management');

Route::get('/outdocs/create', 'Client\OutDocsController@create')->name('create-out-docs');
