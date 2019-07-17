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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::resource('products', 'ProductController');


//Product
//Route::get('/products', 'ProductController@index'); // lists
//Route::get('/products/create','ProductController@create');
//Route::post('/products/create','ProductController@store');
//
////edit
//Route::get('/products/edit/{id}','ProductController@edit'); // Show
//Route::post('/products/edit/{id}','ProductController@update');
//
////delete
//Route::delete('/products/create/{id}','ProductController@destroy');


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function (): void {
    Route::group(['prefix' => 'products'], function (): void {
        Route::get('/', 'ProductController@index'); // lists
        Route::get('/create','ProductController@create');
        Route::post('/create','ProductController@store');
        Route::get('/edit/{id}','ProductController@edit'); // Edit
        Route::post('/edit/{id}','ProductController@update');
        Route::delete('/{id}','ProductController@destroy');
        Route::get('/{id}','ProductController@show'); // Show
        });

    Route::group(['prefix' => 'categories'], function (): void {
        Route::get('/', 'CategoryController@index'); // lists
        Route::get('/create','CategoryController@create');
        Route::post('/create','CategoryController@store');
        Route::get('/edit/{id}','CategoryController@edit'); // Edit
        Route::post('/edit/{id}','CategoryController@update');
        Route::delete('/{id}','CategoryController@destroy');
        Route::get('/{id}','CategoryController@show'); // Show
    });
});

