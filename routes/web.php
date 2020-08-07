<?php

use Illuminate\Support\Facades\Route;

Route::get('site-bakim-asamasinda', function () {
    return view('front.maintenance');
});

/************BACKEND************/
Route::prefix('admin')->name('admin.')->middleware('notLogin')->group(function () {
    Route::get('giris', 'Back\AuthController@login')->name('login');
    Route::post('giris', 'Back\AuthController@login_post')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('panel', 'Back\Dashboard@index')->name('dashboard');

    //ARTICLE ROUTES
    Route::resource('makale', 'Back\ArticleController');
    Route::get('cop/makale', 'Back\ArticleController@trashed')->name('trashed.article');
    Route::get('/switcharticle', 'Back\ArticleController@switch')->name('article.switch');
    Route::get('/deletearticle/{id}', 'Back\ArticleController@delete')->name('delete.article');
    Route::get('/harddeletearticle/{id}', 'Back\ArticleController@harddelete')->name('hard.delete.article');
    Route::get('/recyclearticle/{id}', 'Back\ArticleController@recycle')->name('recycle.article');
    //

    //CATEGORY ROUTES
    Route::resource('kategori', 'Back\CategoryController');
    Route::get('cop/kategori', 'Back\CategoryController@trashed')->name('category.trashed');
    Route::get('/switchcategory', 'Back\CategoryController@switch')->name('category.switch');
    Route::get('/deleteCategory/{id}', 'Back\CategoryController@delete')->name('category.delete');
    Route::get('/harddeleteCategory/{id}', 'Back\CategoryController@harddelete')->name('category.hd');
    Route::get('/recycleCategory/{id}', 'Back\CategoryController@recycle')->name('category.recycle');
    //

    //PAGE ROUTES
    Route::resource('sayfa', 'Back\PageController');
    Route::get('cop/sayfa', 'Back\PageController@trashed')->name('page.trashed');
    Route::get('/switchpage', 'Back\PageController@switch')->name('page.switch');
    Route::get('/deletePage/{id}', 'Back\PageController@delete')->name('page.delete');
    Route::get('/harddeletePage/{id}', 'Back\PageController@harddelete')->name('page.hd');
    Route::get('/recyclePage/{id}', 'Back\PageController@recycle')->name('page.recycle');
    Route::get('/sayfa/sirala', 'Back\PageController@orders')->name('page.orders');
    //

    //CONFIG ROUTES
    Route::get('/ayarlar', 'Back\ConfigController@index')->name('config.index');
    Route::post('/ayarlar/guncelle', 'Back\ConfigController@update')->name('config.update');
    //


    Route::get('cikis', 'Back\AuthController@logout')->name('logout');
});


/************FRONTEND************/
Route::get('/', 'Front\Home@index')->name('home');
Route::get('/iletisim', 'Front\Home@contact')->name('contact');
Route::post('/iletisim', 'Front\Home@contact_post')->name('contact.post');
Route::get('/{sayfa}', 'Front\Home@page')->name('page');
Route::get('/kategori/{category}', 'Front\Home@category')->name('category');
Route::get('/yazi/{category}/{slug}', 'Front\Home@detail')->name('detail');


