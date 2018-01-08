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

Route::get('/', function () {
    return view('Welcome');
})->name('welcome');

Route::get('Welcome/login',[
    'uses'=>'UserController@login_view',
    'as'=>'login_view'
]);

Route::get('Home',[
    'uses'=>'UserController@Home_view',
    'as'=>'Home_view'
   
]);
Route::get('Explore',[
    'uses'=>'UserController@Explore_view',
    'as'=>'Explore_view'
   
]);
//the route
Route::get('/Profile/{id}','UserController@Profile_view');

Route::get('delete/{id}','UserController@delete');

Route::get('Logout',[
    'uses'=>'UserController@Logout',
    'as'=>'Logout'
]);
/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------

*/

Route::post('signup',[
    'uses'=>'UserController@register_user',
    'as'=>'signup'
]);

Route::post('signin',[
    'uses'=>'UserController@login',
    'as'=>'login'
]);

Route::post('update',[
    'uses'=>'UserController@update_user',
    'as'=>'update'
]);

Route::post('update_img',[
    'uses'=>'UserController@update_image',
    'as'=>'update_image'
]);

Route::post('upload_post',[
    'uses'=>'PostsController@upload_Post',
    'as'=>'upload_post'
]);