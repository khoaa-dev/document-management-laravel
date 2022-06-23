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


// Load Ajax
Route::post('/loaiDonVi-VBDen', 'Client\ComeDocsController@getDonVi')->name('getDonVi-VBDen');

Route::post('/loaiDonVi-VBDi', 'Client\OutDocsController@getDonVi')->name('getDonVi-VBDi');

Route::post('/loaiDonVi-VBDen-tao', 'Client\ComeDocsController@getDonVi')->name('getDonVi-VBDen-tao');

Route::post('/loaiDonVi-VBDi-tao', 'Client\OutDocsController@loadAjaxDonVi')->name('getDonVi-VBDi-tao');


// Tao danh sach Van Ban Di
Route::post('/DSDonViNhan', 'Client\OutDocsController@loadDanhSach')->name('loadDanhSach');

Route::post('/themDonVi', 'Client\OutDocsController@addDonVi')->name('themDonVi');

Route::post('/xoaDonVi', 'Client\OutDocsController@removeDonVi')->name('xoaDonVi');

Route::post('/taoVanBanDi', 'Client\OutDocsController@store')->name('taoVanBanDi');

// Xem chi tiet Van Ban Di
Route::get('/detail/{id}', 'Client\OutDocsController@detail')->name('xemChiTiet');

// Cap nhat noi dung Van Ban Di
Route::post('/updateVBDi/{id}', 'Client\OutDocsController@update')->name('capNhatVBDi');

// Xoa van ban di 
Route::get('/deleteView/{id}', 'Client\OutDocsController@delete')->name('formXoa');

Route::post('/delete/{id}', 'Client\OutDocsController@destroy')->name('xoaVanBanDi');

Route::post('/init-session', 'FoodController@initSession')->name('initSession');

