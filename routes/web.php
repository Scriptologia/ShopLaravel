<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Language Translation
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'] , 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
        Route::get('/products', 'ProductController@apiGetProducts')->name('products');
        Route::get('/product/edit/{id?}', 'ProductController@apiProductEdit')->name('product.edit');
        Route::post('/product/update/{id?}', 'ProductController@apiProductUpdate')->name('product.update');
        Route::post('/product/delete/{id?}', 'ProductController@apiProductDelete')->name('product.delete');
        Route::get('/product/view/{id?}', 'ProductController@apiProductView')->name('product.view');

        Route::get('/categories', 'CategoryController@apiGetCategories')->name('categories');
        Route::get('/category/edit/{id?}', 'CategoryController@apiCategoryEdit')->name('category.edit');
        Route::post('/category/update/{id?}', 'CategoryController@apiCategoryUpdate')->name('category.update');
        Route::post('/category/delete/{id?}', 'CategoryController@apiCategoryDelete')->name('category.delete');

        Route::get('/tags', 'TagController@apiGetTags')->name('tags');
        Route::get('/tag/edit/{id?}', 'TagController@apiTagEdit')->name('tag.edit');
        Route::post('/tag/update/{id?}', 'TagController@apiTagUpdate')->name('tag.update');
        Route::post('/tag/delete/{id?}', 'TagController@apiTagDelete')->name('tag.delete');

        Route::get('/orders', 'OrderController@apiGetOrders')->name('orders');
        Route::get('/order/edit/{id?}', 'OrderController@apiOrderEdit')->name('order.edit');
        Route::post('/order/update/{id?}', 'OrderController@apiOrderUpdate')->name('order.update');
        Route::post('/order/delete/{id?}', 'OrderController@apiOrderDelete')->name('order.delete');
//        Route::get('/order/view/{id?}', 'OrderController@apiOrderView')->name('order.view');

        Route::any('/users', 'UserController@apiGetUsers')->name('users');
        Route::get('/user/edit/{id?}', 'UserController@apiUserEdit')->name('user.edit');
        Route::post('/user/update/{id?}', 'UserController@apiUserUpdate')->name('user.update');
        Route::post('/user/delete/{id?}', 'UserController@apiUserDelete')->name('user.delete');
        Route::get('users/export', 'UserController@apiExport')->name('users.export');
        Route::post('users/import', 'UserController@apiImport')->name('users.import');
//        Route::get('/user/view/{id?}', 'UserController@apiUserView')->name('role.view');

        Route::get('/roles', 'RoleController@apiGetRoles')->name('roles');
        Route::get('/role/edit/{id?}', 'RoleController@apiRoleEdit')->name('role.edit');
        Route::post('/role/update/{id?}', 'RoleController@apiRoleUpdate')->name('role.update');
        Route::post('/role/delete/{id?}', 'RoleController@apiRoleDelete')->name('role.delete');

        Route::get('/permissions', 'PermissionController@apiGetPermissions')->name('permissions');
        Route::get('/permission/edit/{id?}', 'PermissionController@apiPermissionEdit')->name('permission.edit');
        Route::post('/permission/update/{id?}', 'PermissionController@apiPermissionUpdate')->name('permission.update');
        Route::post('/permission/create', 'PermissionController@apiPermissionCreate')->name('permission.create');
        Route::post('/permission/delete/{id?}', 'PermissionController@apiPermissionDelete')->name('permission.delete');

        Route::get('/emails', 'EmailController@apiGetEmails')->name('emails');
        Route::get('/email/edit/{id?}', 'EmailController@apiEmailEdit')->name('email.edit');
        Route::post('/email/update/{id?}', 'EmailController@apiEmailUpdate')->name('email.update');
        Route::post('/email/delete/{id?}', 'EmailController@apiEmailDelete')->name('email.delete');
        Route::get('/email/view/{id?}', 'EmailController@apiEmailView')->name('email.view');
        Route::get('emails/export', 'EmailController@apiExport')->name('emails.export');
        Route::post('emails/import', 'EmailController@apiImport')->name('emails.import');

    });

    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/product/edit', 'ProductController@edit')->name('product.edit');
    Route::get('/product/view/{id?}', 'ProductController@show')->name('product.view');
    Route::get('/product/create', 'ProductController@create')->name('product.create');

    Route::get('/categories', 'CategoryController@index')->name('categories');

    Route::get('tags', 'TagController@index')->name('tags');

    Route::get('/users', 'UserController@index')->name('users');
//    Route::get('/user/edit', 'UserController@edit')->name('user.edit');
//    Route::get('/user/view/{id?}', 'UserController@show')->name('user.view');
//    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::get('/user/{id}', 'UserController@show')->name('user');

    Route::get('/orders', 'OrderController@index')->name('orders');
//    Route::get('/order/edit', 'OrderController@edit')->name('order.edit');
    Route::get('/order/view/{id?}', 'OrderController@show')->name('order.view');
//    Route::get('/order/create', 'OrderController@create')->name('order.create');

    Route::get('/roles', 'RoleController@index')->name('roles');
    Route::get('/permissions', 'PermissionController@index')->name('permissions');

    Route::get('/emails', 'EmailController@index')->name('emails');

    Route::get('index/{locale}', 'HomeController@lang');

    Route::get('/', 'HomeController@root')->name('root');

//Update User Details
    Route::post('/update-profile/{id}', 'HomeController@updateProfile')->name('updateProfile');
    Route::post('/update-password/{id}', 'HomeController@updatePassword')->name('updatePassword');

    Route::get('{any}', 'HomeController@index')->name('index');

});

Route::group(['middleware' => ['web']], function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/products', 'ProductController@index')->name('products');
            Route::get('/blog', function () { return view('front.blog'); })->name('blog');
            Route::get('/post', function () { return view('front.post'); })->name('post');
            Route::get('/about', function () { return view('front.about'); })->name('about');
            Route::get('/faq', function () { return view('front.faq'); })->name('faq');
            Route::get('/contacts', function () { return view('front.contacts'); })->name('contacts');
            Route::get('/wishlist', function () { return view('front.wishlist'); })->name('wishlist');

            Route::get('/{product}', 'ProductController@show')->name('product');
});

