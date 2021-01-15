<?php

use App\Http\Controllers\PostController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Category;
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





// ===============dashboard=========================

Route::get('/home', function () { return view ('home');});
Route::get('/dashboard', 'HomeController@index')->name('admin');
Route::get('/dashboard/doctor', 'DoctorController@index')->name('doctor');
Route::get('/dashboard/admin', 'HomeController@index')->name('admin');
Route::get('/admin', function () { return redirect ('/dashboard/admin'); });
Route::get('db-login', function () { return view('auth.login'); });
Route::get('dashboard/login', function () { return view('auth.login'); });
Route::get('dashboard/user/settings', 'HomeController@settings')->name('user.settings');
Route::post('dashboard/user/settings', 'HomeController@uploadAvatar')->name('user.avatar');
Route::post('dashboard/user/changepassword', 'HomeController@changePassword')->name('change.password');


// Post Modules
Route::get('dashboard/posts', 'PostController@index')->name('post.index');
Route::get('dashboard/posts/new', 'PostController@newPost')->name('post.newPost');
Route::post('dashboard/posts/add', 'PostController@store')->name('post.add');
Route::get('dashboard/posts/delete/{id}', 'PostController@destroy')->name('post.delete');
Route::get('dashboard/posts/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('dashboard/posts/update/{id}', 'PostController@update');
Route::get('dashboard/categories/new', 'CategoryController@index')->name('category.index');
Route::post('dashboard/categories/add', 'CategoryController@store')->name('category.add');
Route::get('changStatus', 'CategoryController@changStatus')->name('change.status');



