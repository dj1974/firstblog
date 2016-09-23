<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function () {
    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
    ]);
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [
    'uses' => 'UserController@getRegister',
    'as' => 'register'
]);

Route::post('/sign-up', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::get('/login', [
    'uses' => 'UserController@getLogin',
    'as' => 'login'
]);

Route::post('/sign-in', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account',
    'middleware' => 'auth'
]);

Route::post('/update-image', [
    'uses' => 'UserController@postSaveImage',
    'as' => 'image.save'
]);

Route::post('/create-post', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit'
]);

Route::get('/about', [
    'uses' => 'AboutController@index',
    'as' => 'about'
]);

Route::get('/project', [
    'uses' => 'ProjectController@index',
    'as' => 'project'
]);

Route::get('/service', [
    'uses' => 'ServiceController@index',
    'as' => 'service'
]);

Route::get('/contact', [
    'uses' => 'ContactController@index',
    'as' => 'contact',
    'middleware' => 'auth'
]);

Route::post('/create-comment/{post_id}', [
    'uses' => 'CommentController@postCreateComment',
    'as' => 'comment.create',
    'middleware' => 'auth'
]);

Route::get('/show-post/{post_id}', [
    'uses' => 'PostController@show',
    'as' => 'post.show',
]);

Route::get('/post-details-create/{post_id}', [
    'uses' => 'PostdetailsController@createDetails',
    'as' => 'create.details',
    'middleware' => 'auth'
]);

Route::post('/post-details-save/{post_id}', [
    'uses' => 'PostdetailsController@saveDetails',
    'as' => 'save.details'
]);

Route::get('/show-user', [
    'uses' => 'UserController@show',
    'as' => 'users',
    'middleware' => 'auth'
]);

Route::get('/show-guests', [
    'uses' => 'UserController@showGuests',
    'as' => 'guests'
]);

Route::get('/show-admins', [
    'uses' => 'UserController@showAdmins',
    'as' => 'admins'
]);

Route::post('/changeStatusCheckBox', [
    'uses' => 'TaskController@checkBox',
    'as' => 'changeStatus'
]);




