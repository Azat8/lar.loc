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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'web'],function (){

    Route::match(['post','get'], '/', ['uses' => 'IndexController@execute', 'as' => 'home']);
    Route::auth();

});
//admin/service
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/',function (){
   // view admin page
        return view('admin/index');
    });
    /*
    Route::group(['prefix' => 'pages'],function (){

    //admin pages
        Route::get('/',['uses' => 'PagesController@execute', 'as' => 'pages']);
        //admin/pages/add
        Route::match(['get','post'],'/add',['uses' => 'PagesAddController@execute','as' => 'pagesAdd']);
        //admin/edit/2
        Route::match(['get','post','delete'],'/edit/{page}',['uses' => 'PagesEditController@execute','as' => 'pagesEdit']);
    });
    */

});