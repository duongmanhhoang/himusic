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

Route::get('/', 'Client\HomeController@index')->name('client.index');

//Events
Route::get('/su-kien' , 'Client\EventController@index')->name('client.events.index');
Route::get('/su-kien/{slug}' , 'Client\EventController@detail')->name('client.events.detail');

Route::prefix('san-pham')->name('client.products.')->group(function (){
    $c = 'Client\ProductController@';
   Route::get('/' , $c . 'index')->name('index');
   Route::get('/{slug}' , $c . 'detail')->name('detail');
   Route::get('/danh-muc/{slug}', $c.'categories')->name('categories.index');
});

Route::prefix('lop-hoc')->name('client.classes.')->group(function (){
    $c = 'Client\ClassesController@';
    Route::get('/' , $c . 'index')->name('index');
    Route::get('/{slug}' , $c . 'detail')->name('detail');
});

Route::prefix('tin-tuc')->name('client.posts.')->group(function (){
   $c = 'Client\PostController@';
   Route::get('/', $c. 'index')->name('index');
   Route::get('/{slug}', $c . 'detail')->name('detail');
   Route::get('/danh-muc/{slug}', $c.'categories')->name('categories.index');
});

Route::prefix('gio-hang')->name('client.cart.')->group(function (){
   $c = 'Client\CartController@';
   Route::get('/' , $c . 'index')->name('index');
   Route::post('/add/{id}' , $c . 'add')->name('add');
   Route::post('update/{id}' , $c .'update')->name('update');
   Route::get('delete/{id}' , $c . 'delete')->name('delete');
});

Route::get('thanh-toan' , 'Client\CartController@checkout')->name('client.checkout');
Route::post('thanh-toan/submit' ,'Client\CartController@submit')->name('client.checkout.submit');

Route::get('tim-kiem' , 'Client\SearchController@index')->name('client.search');

Route::get('lien-he' , 'Client\PageController@contact')->name('client.contact');

Route::prefix('login')->name('login.')->group(function (){
   Route::get('/' , 'AuthController@index')->name('index');
   Route::post('/submit' , 'AuthController@submit')->name('submit');
});



