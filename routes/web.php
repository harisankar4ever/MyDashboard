<?php

use App\Http\Controllers\PostController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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


Auth::routes(['verify'=>true]);




Route::get('/home', function () { return view ('home');});
Route::get('db-login', function () { return view('auth.login'); });
Route::get('dashboard/login', function () { return view('auth.login'); });
Route::get('/dashboard', 'HomeController@index')->name('admin');
Route::get('/dashboard', function () {return Redirect('dashboard/login'); });

// ===============dashboard=========================

Route::middleware(['role:administrator'])->group(function () {


    Route::get('/dashboard/admin', 'HomeController@index')->name('admin');
    Route::get('/admin', function () { return redirect ('/dashboard/admin'); });
    Route::get('dashboard/user/settings', 'HomeController@settings')->name('user.settings');
    Route::post('dashboard/user/settings', 'HomeController@uploadAvatar')->name('user.avatar');
    Route::post('dashboard/user/changepassword', 'HomeController@changePassword')->name('change.password');


      // ==================Post Modules==============

    Route::prefix('dashboard/posts/')->group(function () {


        Route::get('/', 'PostController@index')->name('post.index');
        Route::get('new', 'PostController@newPost')->name('post.newPost');
        Route::post('add', 'PostController@store')->name('post.add');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.delete');
        Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('update/{id}', 'PostController@update');

    });


    // category Modules
    Route::get('dashboard/categories/new', 'CategoryController@index')->name('category.index');
    Route::post('dashboard/categories/add', 'CategoryController@store')->name('category.add');
    Route::get('changStatus', 'CategoryController@changStatus')->name('change.status');

    // Product Modules
    Route::get('dashboard/products', 'ProductController@index')->name('product.index');
    Route::get('dashboard/products/new', 'ProductController@newProduct')->name('product.newPost');
    Route::post('dashboard/products/add', 'ProductController@store')->name('product.add');
    Route::get('dashboard/products/delete/{id}', 'ProductController@destroy')->name('product.delete');
    Route::get('dashboard/products/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('dashboard/products/update/{id}', 'ProductController@update');

    // Slider Modules
    Route::get('dashboard/sliders', 'SliderController@index')->name('slider.index');
    Route::get('dashboard/sliders/new', 'SliderController@newSlider')->name('slider.newPost');
    Route::post('dashboard/sliders/add', 'SliderController@store')->name('slider.add');
    Route::get('dashboard/sliders/delete/{id}', 'SliderController@destroy')->name('slider.delete');
    Route::get('dashboard/sliders/edit/{id}', 'SliderController@edit')->name('slider.edit');
    Route::post('dashboard/sliders/update/{id}', 'SliderController@update');


    // Photo Modules
    Route::get('dashboard/photos', 'PhotoController@index')->name('photo.index');
    Route::get('dashboard/photos/new', 'PhotoController@newPhoto')->name('photo.newPost');
    Route::post('dashboard/photos/add', 'PhotoController@store')->name('photo.add');
    Route::get('dashboard/photos/delete/{id}', 'PhotoController@destroy')->name('photo.delete');
    Route::get('dashboard/photos/edit/{id}', 'PhotoController@edit')->name('photo.edit');
    Route::post('dashboard/photos/update/{id}', 'PhotoController@update');

    // category Modules
    Route::get('dashboard/photocategories/new', 'PhotocategoryController@index')->name('photocategory.index');
    Route::post('dashboard/photocategories/add', 'PhotocategoryController@store')->name('photocategory.add');
    Route::get('changStatus', 'PhotocategoryController@changStatus')->name('change.status');

});
Route::middleware(['role:doctor'])->group(function () {

    Route::get('/dashboard/doctor', 'DoctorController@index')->name('doctor');

});


// Route::get('dashboard/doctors/posts/{name?}', function ($slug=null) {
    //     return "this is your output:". $slug;
    // });
