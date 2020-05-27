<?php

use Illuminate\Support\Facades\Route;

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

	Route::post('/subscribe', function(){
	$email = request('email');

	Newsletter::subscribe($email);

	Session::flash('subscribed', 'subscribed successfully');

	return redirect()->back();
});



Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('post.single');

Route::get('/category/{id}', 'FrontEndController@category')->name('category.single');

Route::get('/tag/{id}', 'FrontEndController@tag')->name('tag.single');

Route::get('/results', function(){
	$posts = \App\Post::where('title','like', '%' . request('query') . '%')->get();

	return view('results')->with('posts', $posts)
    						->with('title','Search results: ' . request('query'))
    						->with('settings', \App\Setting::first())
    						->with('categories', \App\Category::take(4)->get())
    						->with('query', request('query'));
    						


});


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){


Route::get('/dashboard', 'HomeController@index')->name('home');

	Route::get('/posts', 'PostsController@index')->name('posts');

	Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');

	Route::get('/posts/kill/{id}', 'PostsController@kill')->name('posts.kill');

	Route::get('/posts/restore/{id}', 'PostsController@restore')->name('posts.restore');

	Route::get('/posts/create', 'PostsController@create')->name('post.create');

	Route::post('/posts/store', 'PostsController@store')->name('post.store');

	Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');

	Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');

	Route::get('/posts/delete/{id}', 'PostsController@destroy')->name('posts.delete');

	Route::get('/category/create', 'CategoriesController@create')->name('category.create');

	Route::post('/category/store', 'CategoriesController@store')->name('category.store');

	Route::get('/categories', 'CategoriesController@index')->name('categories');

	Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');

	Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');

	Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

	Route::post('/tag/update/{id}', 'tagsController@update')->name('tags.update');

	Route::get('/tag', 'tagsController@index')->name('tags');

	Route::get('/tag/edit/{id}', 'tagsController@edit')->name('tags.edit');

	Route::get('/tag/create', 'tagsController@create')->name('tags.create');

	Route::post('/tag/store/', 'tagsController@store')->name('tags.store');

	Route::get('/tag/delete/{id}', 'tagsController@destroy')->name('tags.delete');

	Route::get('/users', 'UsersController@index')->name('users');

	Route::get('/users/create', 'UsersController@create')->name('user.create');

	Route::post('/users/store', 'UsersController@store')->name('user.store');

	Route::post('/users/update/{id}', 'UsersController@update')->name('user.update');



	Route::get('user/admin/{id}', 'UsersController@admin')->name('user.admin');

	Route::get('user/not-admin/{id}', 'UsersController@not_admin')->name('user.not.admin');

	Route::get('user/profile', 'ProfilesController@index')->name('user.profile');

	//since we used the Auth class in the controller no need for params

	Route::post('user/profile/update', 'ProfilesController@update')->name('user.profile.update');

	Route::get('user/delete/{id}', 'UsersController@destroy')->name('user.delete');


	Route::get('/settings', 'SettingsController@index')->name('settings');

	Route::post('/settings/update', 'SettingsController@update')->name('settings.update');






});