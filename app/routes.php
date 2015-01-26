<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|  
*/


Route::get('home', array('as'=>'home', 'uses'=>'AccountController@getHomePage') );

Route::get('account/auth/login', array('as'=>'account-login',  'uses'=>'AccountController@getSignin'));

Route::get('account/auth/signup', array('as'=>'account-register', 'uses'=>'AccountController@getSignup'));

Route::get('contact/us',array('as'=>'contact-me','uses'=>'AccountController@getContact'));

Route::get('get/blog', array('as'=>'getblog', 'uses'=>'BlogController@getBlog'))->before('auth');

Route::post('account/auth/signup', array('as'=>'account-postregister', 'uses'=>'AccountController@postRegister'));

Route::get('account/activate/{code}', array('as'=>'account-activate', 'uses'=>'AccountController@getActivate'));

Route::post('account/auth/login', array('as'=>'account-post-login', 'uses'=>'AccountController@postLogin'));

Route::post('contact/us', array('as'=>'post-contact-us', 'uses'=>'AccountController@postcontact'));

Route::get('add/blog', array('as'=>'add-blog', 'uses' => 'BlogController@getaddBlog'))->before('auth');

Route::post('add/blog', array('as'=>'post-blog', 'uses' => 'BlogController@postBlog'))->before('auth');

Route::get('logout', array('as'=>'logout', 'uses'=> 'AccountController@logout'));

Route::get('manage/blog', array('as'=>'manage-your-blogs', 'uses'=>'BlogController@yourBlog'))->before('auth');

Route::get('blog/comment/{id}', array('as' =>'comment-delete', 'uses'=>'BlogController@commentdelete'))->before('auth');

Route::get('blog/post/delete/{id}', array('as' =>'post-delete', 'uses'=>'BlogController@postdelete'))->before('auth');

Route::post('get/blog', array('as'=>'post-comments', 'uses'=>'BlogController@postcomments'))->before('auth');