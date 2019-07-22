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
// login is home
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
// home page after login
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    // routes for insert
   Route::get('/viewinsert', 'PassWordController@viewInsert')->name('viewinsert');
   Route::post('/insertpass', 'PassWordController@insertPass')->name('insertpass');
   // routes for edit
   Route::get('/viewedit/{id}', 'PassWordController@viewEdit')->name('viewedit');
   Route::post('/passedit/{id}', 'PassWordController@editPass')->name('editpass');
   // routes for delete
   Route::post('/passdelete/{id}', 'PassWordController@deletePass')->name('deletepass');
   // search route
   Route::get('/search', 'PassWordController@search')->name('search');
});
