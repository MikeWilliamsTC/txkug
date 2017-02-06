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

Route::name('welcome.index')->get('/', 'WelcomeController@index');
Route::name('blog.index')->get('/blog', 'BlogController@index');

Route::get('/social/redirect/{provider}', ['as' => 'social.redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}', ['as' => 'social.handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrator'], function() {
    Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);
    Route::resource('/venues', 'Admin\VenueController');
    Route::resource('/events', 'Admin\EventsController');
    Route::resource('/users', 'Admin\UsersController');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:all'], function() {
    Route::get('/', ['as' => 'user.home', 'uses' => 'UserController@index']);
    Route::get('/meetings', ['as' => 'user.events', 'uses' => 'UserController@events']);
});

Route::group(['middleware' => 'auth:all'], function() {
    Route::get('/logout', ['as' => 'authenticated.logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'ActivateController@activate']);
    Route::get('/activate', ['as' => 'authenticated.activation-resend', 'uses' => 'ActivateController@resend']);
});

Auth::routes(['login' => 'auth.login', 'middleware' => 'auth:all']);

Route::group(['prefix' => 'api', 'middleware' => 'auth:all'], function () {
    Route::get('/event', 'API\EventController@fetchEvent');
    Route::post('/event', 'API\EventController@eventCheckIn');
    Route::get('/event/{id}', 'API\EventController@getParticipants');
    Route::post('/user', 'API\UserController@setRole');
});