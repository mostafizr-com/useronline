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

use App\Events\TaskEvent;




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
        'middleware' => 'checkAuthor'
    ), 
    function(){  
        Route::get('/dasdhboard/{user}/profile-edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('/dasdhboard/{id}/profile-update', 'ProfileController@update')->name('profile.update');
        Route::get('/dasdhboard/{user}/articles', 'ProfileController@articles')->name('user.articles');
    });

    Route::get('/dashboard/all-users/', 'ProfileController@all_users')->name('allusers');

    Route::group(array(
        'middleware' => 'checkManage'
    ), function(){
        Route::resource('/dashboard/category', 'CategoryController');
        Route::resource('/dashboard/tag', 'TagController');
    });


    Route::resource('/dashboard/post', 'PostController');

});

Route::post('update/social/info', 'Auth\LoginController@socialUpdateInfo')->name('update.social.info');

//Social login routes
Route::get('login/social/{method}', 'Auth\LoginController@socialLoginRedirect')->name('social.login');

//Social Callback functionality
Route::get('login/{method}/callback', 'Auth\LoginController@providerCallback');


Route::get('event', function(){
    event(new TaskEvent("Hey how are you?"));
});

Route::get('listener', function(){
    return view('listenBrodcast');
});

