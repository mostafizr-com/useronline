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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(array(
    'namespace' => 'dashboard',
    'middleware' => 'auth'
),
function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/dasdhboard/{user}/profile', 'ProfileController@index')->name('profile');

    Route::group(array(
        'middleware' => 'checkUser'
    ), 
    function(){  
      Route::get('/dasdhboard/{user}/profile-edit', 'ProfileController@edit')->name('profile.edit');
      Route::put('/dasdhboard/{id}/profile-update', 'ProfileController@update')->name('profile.update');
    });

    Route::get('/dashboard/all-users/', 'ProfileController@all_users')->name('allusers');

    Route::resource('/dashboard/category', 'CategoryController');
    Route::resource('/dashboard/tag', 'TagController');
    Route::resource('/dashboard/post', 'PostController');

});

