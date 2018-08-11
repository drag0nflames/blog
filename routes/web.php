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


	Route::group(['middleware' => ['web']], function () {
		//Authentication routes
		Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
		Route::post('auth/login', 'Auth\LoginController@login');
		Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

		//Register Routes
		Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('auth/register', 'Auth\RegisterController@register');

		//Reset Password Routes
		// Password reset link request routes...
		Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
		Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

		// Password reset routes...
		Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
		Route::post('password/reset', 'Auth\ResetPasswordController@reset');

		//Categories Route
		Route::resource('categories', 'CategoryController')->except('create');

		//Tag Route
		Route::resource('tags', 'TagController')->except('create');

		//comment controller
		Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
        Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
		Route::put('comments/{id}', 'CommentsController@update')->name('comments.update');
		Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');

		Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');


		Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);


		Route::get('/', 'PagesController@getIndex');


		Route::get('about', 'PagesController@getAbout');


		Route::get('contact', 'PagesController@getContact')->name('contact');
		Route::post('contact', 'PagesController@postContact');

		
		Route::resource('posts', 'PostController');
	});
