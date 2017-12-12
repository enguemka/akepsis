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

Route::group(['prefix'=>'/', 'middleware'=>'guest'], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'WelcomeController@index']);
    Route::get('about', ['as' => 'about', 'uses' => 'WelcomeController@about']);
    Route::get('howitworks', ['as' => 'how', 'uses' => 'WelcomeController@how']);
    Route::get('/login', ['as' => 'pro.login', 'uses' => 'Auth\AuthController@index']);
    Route::get('/signup', ['as' => 'pro.signup', 'uses' => 'Auth\AuthController@getSignUp']);
    Route::post('/signup/save', ['as' => 'pro.save', 'uses' => 'Auth\AuthController@register']);
});



Route::get('/test', function() {

    $role = Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Professionals',
        'slug' => 'pro',
        'permissions' => [
            'pro.view' => true,
            'pro.edit' => true,
            'pro.delete' => false
        ]
    ]);

    return json_encode($role);
});

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
