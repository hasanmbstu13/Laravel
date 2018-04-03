<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware  group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'tenant'], function() {

    Route::post('authenticate', 'AuthenticateController@authenticate');
//    Route::post('authenticate-tenant', 'AuthenticateController@authenticateTenant');
    
    Route::group(['namespace' => 'Api', 'middleware' => 'jwt.auth'], function() {
        Route::resource('users', 'UserController');
        Route::get('user', 'UserController@getAuthUser');
        Route::get('auth-user', 'UserController@getAuthenticatedUser');
        Route::resource('student', 'StudentController');
    });

});
