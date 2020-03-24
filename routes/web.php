<?php

use Illuminate\Support\Facades\Route;
//страницы сайта
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

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);

Route::group(['prefix'=>'admin'], function (){

    Route::group(['middleware'=>'is_admin'], function () {
        Route::get('/orders', 'HomeController@index')->name('orders');
    });
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('products', 'Admin\ProductController');
});
Route::get('/social-auth/{provider}', 'Auth\SocialController@redirectToProvider')->name('auth.social');
Route::get('/social-auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('auth.social.callback');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::get('/', 'MainController@index')->name('index');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::group(['middleware'=>'empty_basket'], function () {
    Route::get('/basket', 'BasketController@basket')->name('basket');
    Route::get('/basket/place', 'BasketController@order')->name('order');
    Route::post('/basket/place', 'BasketController@orderConfirm')->name('orderConfirm');
});
Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');

Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product?}', 'MainController@product')->name('product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
