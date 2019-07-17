<?php


Route::get('/', function () {
    return view('admin.index');
})->name('admin.index');

Route::post('/logout', 'AuthController@logout')->name('logout');

Route::prefix('users')->name('admin.users.')->group(function () {
    $u = 'Admin\UserController';
    Route::get('/', $u . '@index')->name('index');
    Route::get('/create', $u . '@create')->name('create');
    Route::post('/store', $u . '@store')->name('store');
    Route::get('/edit/{id}', $u . '@edit')->name('edit');
    Route::post('/update/{id}', $u . '@update')->name('update');
    Route::get('delete/{id}', $u . '@delete')->name('delete');
    Route::get('password/{id}', $u . '@password')->name('password');
    Route::post('password/{id}/update', $u . '@updatePassword')->name('updatePassword');
});


Route::prefix('settings')->name('admin.setting.')->group(function () {
    $w = 'Admin\SettingController';
    Route::get('/', $w . '@index')->name('index');
    Route::post('/update/{id}', $w . '@update')->name('update');
});


Route::prefix('testimonials')->name('admin.testimonials.')->group(function () {
    $p = 'Admin\TestimonialController';
    Route::get('/', $p . '@index')->name('index');
    Route::get('/create', $p . '@create')->name('create');
    Route::post('/store', $p . '@store')->name('store');
    Route::get('/edit/{id}', $p . '@edit')->name('edit');
    Route::post('/update/{id}', $p . '@update')->name('update');
    Route::get('delete/{id}', $p . '@delete')->name('delete');
});


Route::prefix('products')->name('admin.products.')->group(function () {
    $p = 'Admin\ProductController';
    Route::get('/', $p . '@index')->name('index');
    Route::get('/create', $p . '@create')->name('create');
    Route::get('/edit/{id}', $p . '@edit')->name('edit');
    Route::post('/store', $p . '@store')->name('store');
    Route::post('update/{id}', $p . '@update')->name('update');
    Route::get('/delete/{id}', $p . '@delete')->name('delete');
    Route::post('upload/{id}', $p . '@uploadImage')->name('upload');
    Route::post('destroy', $p . '@imageDestroy')->name('destroy');
    Route::get('deleteImage/{id}', $p . '@imageDelete')->name('delete.image');
    Route::get('categories', $p . '@categories')->name('categories.index');
    Route::get('categories/create', $p . '@categoriesCreate')->name('categories.create');
    Route::post('categories/store', $p . '@categoriesStore')->name('categories.store');
    Route::get('categories/edit/{id}', $p . '@categoriesEdit')->name('categories.edit');
    Route::post('categories/update/{id}', $p . '@categoriesUpdate')->name('categories.update');
    Route::get('categories/delete/{id}', $p . '@categoriesDelete')->name('categories.delete');
});

Route::prefix('posts')->name('admin.posts.')->group(function () {
    $p = 'Admin\PostController';
    Route::get('/', $p . '@index')->name('index');
    Route::get('/create', $p . '@create')->name('create');
    Route::get('/edit/{id}', $p . '@edit')->name('edit');
    Route::post('/store', $p . '@store')->name('store');
    Route::post('update/{id}', $p . '@update')->name('update');
    Route::get('/delete/{id}', $p . '@delete')->name('delete');
    Route::get('categories', $p . '@categories')->name('categories.index');
    Route::get('categories/create', $p . '@categoriesCreate')->name('categories.create');
    Route::post('categories/store', $p . '@categoriesStore')->name('categories.store');
    Route::get('categories/edit/{id}', $p . '@categoriesEdit')->name('categories.edit');
    Route::post('categories/update/{id}', $p . '@categoriesUpdate')->name('categories.update');
    Route::get('categories/delete/{id}', $p . '@categoriesDelete')->name('categories.delete');
});

Route::prefix('events')->name('admin.events.')->group(function () {
    $p = 'Admin\EventController';
    Route::get('/', $p . '@index')->name('index');
    Route::get('/create', $p . '@create')->name('create');
    Route::get('/edit/{id}', $p . '@edit')->name('edit');
    Route::post('/store', $p . '@store')->name('store');
    Route::post('update/{id}', $p . '@update')->name('update');
    Route::get('/delete/{id}', $p . '@delete')->name('delete');
    Route::post('upload/{id}', $p . '@uploadImage')->name('upload');
    Route::post('destroy', $p . '@imageDestroy')->name('destroy');
    Route::get('deleteImage/{id}', $p . '@imageDelete')->name('delete.image');
});

Route::prefix('classes')->name('admin.classes.')->group(function () {
    $p = 'Admin\ClassesController';
    Route::get('/', $p . '@index')->name('index');
    Route::get('/create', $p . '@create')->name('create');
    Route::get('/edit/{id}', $p . '@edit')->name('edit');
    Route::post('/store', $p . '@store')->name('store');
    Route::post('update/{id}', $p . '@update')->name('update');
    Route::get('/delete/{id}', $p . '@delete')->name('delete');
    Route::post('upload/{id}', $p . '@uploadImage')->name('upload');
    Route::post('destroy', $p . '@imageDestroy')->name('destroy');
    Route::get('deleteImage/{id}', $p . '@imageDelete')->name('delete.image');
});


Route::prefix('type-classes')->name('admin.type_classes.')->group(function () {
    $p = 'Admin\TypeClassController';
    Route::get('/', $p . '@index')->name('index');
    Route::get('/create', $p . '@create')->name('create');
    Route::get('/edit/{id}', $p . '@edit')->name('edit');
    Route::post('/store', $p . '@store')->name('store');
    Route::post('update/{id}', $p . '@update')->name('update');
    Route::get('/delete/{id}', $p . '@delete')->name('delete');
});


Route::prefix('orders')->name('admin.orders.')->group(function (){
   $c = 'Admin\OrderController';
   Route::get('/' , $c . '@index')->name('index');
   Route::get('/{id}' , $c . '@detail')->name('detail');
   Route::post('update/{id}' , $c . '@update')->name('update');
});
//
//Route::prefix('categories')->name('admin.categories.')->group(function () {
//    $p = 'Admin\CategoryProductController';
//    Route::get('/products', $p . '@index')->name('products.index');
//    Route::get('/products/create', $p . '@create')->name('products.create');
//    Route::post('products/store', $p . '@store')->name('products.store');
//    Route::get('products/edit/{id}', $p . '@edit')->name('products.edit');
//    Route::post('products/update/{id}', $p . '@update')->name('products.update');
//    Route::get('/products/delete/{id}', $p . '@delete')->name('products.delete');
//
//    $a = 'Admin\CategoryPostController';
//    Route::get('/posts', $a . '@index')->name('posts.index');
//    Route::get('/posts/create', $a . '@create')->name('posts.create');
//    Route::post('posts/store', $a . '@store')->name('posts.store');
//    Route::get('posts/edit/{id}', $a . '@edit')->name('posts.edit');
//    Route::post('posts/update/{id}', $a . '@update')->name('posts.update');
//    Route::get('/posts/delete/{id}', $a . '@delete')->name('posts.delete');
//});


