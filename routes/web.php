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

Route::get('/', 'HomeController@frontend')->name('frontend');

Auth::routes();


Route::get('/blog','BlogController@index')->name('blog.index');
Route::get('/single-post/{id}','BlogController@single_post')->name('blog.single.post');
Route::get('/latest-post','BlogController@latest_post')->name('blog.latest.post');
Route::get('/categories','BlogController@category')->name('blog.category');
Route::get('/category/post/{id}','BlogController@category_by_post')->name('blog.category.post');
Route::get('/search','BlogController@search')->name('search');


Route::group(['namespace'=>'Admin','middleware'=>'auth'],function (){
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
    //category
    Route::get('category','CategoryController@index')->name('admin.category.list');
    Route::post('/category-store','CategoryController@store')->name('admin.category.store');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    Route::put('/category-update/{id}','CategoryController@update')->name('admin.category.update');
    Route::get('/category-details/{id}','CategoryController@details')->name('admin.category.details');
    Route::delete('/delete-cat/{id}','CategoryController@destroy')->name('admin.category.destroy');
    Route::get('/delete-all-category/{id}', 'CategoryController@delete_all')->name('admin.category.delete');

    //Post
    Route::get('post','PostController@postList')->name('admin.post.list');
    Route::post('/post-store','PostController@store')->name('admin.post.store');
    Route::get('post-edit/{id}','PostController@edit')->name('admin.post.edit');
    Route::put('post-update/{id}','PostController@upadte')->name('admin.post.update');
    Route::get('/post-details/{id}','PostController@details')->name('admin.post.details');
    Route::delete('/post-delete/{id}','PostController@destroy')->name('admin.post.destroy');

});
