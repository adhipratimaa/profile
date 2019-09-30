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
Route::get('form', function(){
	return view('form');
});

Route::any('/submit', 'PostController@submit')->name('submit');


Route::any('/list','PostController@list')->name('list');
		
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit/{id}', 'PostController@edit')->name('edit');
Route::post('/update','PostController@update')->name('update');
Route::get('/delete/{id}', 'PostController@delete')->name('delete');
Route::get('news', 'PostController@displaynews')->name('displaynews');
Route::any('pictures', 'PostController@picture')->name('pictures');
Route::get('/del','PostController@deleteUnusedImages')->name('del');
Route::get('/age','PostController@age')->name('age');


Route::get('card', function()
{
	return view('card');
});




Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('admin');
 
Route::get('/agent', function(){
    echo "Hello Agent";
})->middleware('agent');
 
Route::get('/customer', function(){
    echo "Hello Customer";
})->middleware('customer');

Auth::routes([ 'register' => false ]);


// Authentication Routes...
// $this->post('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
