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
#blog post routes
Route::get('/',[ 'as' => 'blog.single', 'uses'=> 'BlogController@index']);
Route::get('blog/tag/{id}', 'BlogController@tagShow')->name('tag.blog.show');

#admin posts route
Route::resource('post','PostController', ['except' => ['destroy']]);
Route::post('post/delete','PostController@delete')->name('post.delete');
#tags route
Route::resource('tag' , 'TagController',['except' => ['create']]);

#categories route
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Auth::routes();
#Login
Route::get('auth/login','Auth\LoginController@ShowLoginForm');
Route::post('auth/login','Auth\LoginController@login');
Route::get('auth/logout',['uses' =>'Auth\LoginController@logout' ,'as' => 'logout']);


//Registration routes

Route::get('auth/register', 'Auth\RegisterController@ShowRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@SinglePost'])->where('slug', '[|\w\d\-\_]+');
Route::get('blog' , ['uses' => 'BlogController@Index', 'as' => 'blog.index']);
#comments
Route::post('comment/{post_id}', ['uses' =>'CommentController@store', 'as' => 'comment.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit' , 'as' =>'comments.edit']);
Route::put('comments/{id}/', ['uses' => 'CommentController@update' , 'as' =>'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy' , 'as' =>'comments.destroy']);
Route::get('comments/{id}',['uses' => 'CommentController@delete', 'as' => 'comments.delete']);
