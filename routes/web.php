<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/product/{slug}','Backend\ProductController@showProduct')->name('show.products');
Route::get('/products','Backend\ProductController@indexProduct')->name('index.products');

Route::get('/home', 'MainController@index')->name('home');

Route::namespace('Backend')->prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/','MainController@index')->name('panel');
    Route::get('/panel','MainController@index')->name('panel');
    Route::resource('/articles','ArticleController');
    Route::post('photos/upload','PhotoController@upload')->name('photos.upload');
    Route::get('/contacts','ContactController@index')->name('contacts.index');
    Route::get('/contacts/{id}','ContactController@show')->name('contacts.show');
    Route::delete('/contacts/destroy/{id}','ContactController@destroy')->name('contacts.destroy');

    Route::get('/profile','UserController@profile')->name('profile.index');
    Route::post('/photo/store','PhotoController@store')->name('photo.store');
    Route::get('/comments/true-status','CommentController@trueStatus')->name('comments.trueStatus');
    Route::get('/comments','CommentController@falseStatus')->name('comments.falseStatus');
    Route::get('/comments/false-status','CommentController@falseStatus')->name('comments.falseStatus');
    Route::patch('/comments/update/{id}','CommentController@update')->name('comments.update');
    Route::delete('/comments/destroy/{id}','CommentController@destroy')->name('comments.destroy');
    Route::get('/profile/edit','UserController@profileEdit')->name('profile.edit');
    Route::patch('/profile/update','UserController@profileUpdate')->name('update.profile');
    Route::resource('/users','UserController');
    Route::resource('/products','ProductController');
});

Route::middleware('auth')->group(function(){
    Route::post('/contact-me','MainController@contact_me')->name('contact.us');
    Route::post('photos/upload','Backend\PhotoController@upload')->name('photos.upload');
    Route::post('/comments/store','CommentController@store')->name('comments.store');
    Route::get('/profile', 'Auth\UserController@profile')->name('user.profile');
    Route::get('/payment','PaymentController@getPayment');
    Route::get('/verify','PaymentController@verify');
    Route::get('/profile/edit', 'Auth\UserController@profileEdit')->name('profile.edit');
    Route::patch('/profile/update', 'Auth\UserController@profileUpdate')->name('profile.update');
});

Route::get('/about','MainController@about')->name('about');
Route::get('/contact-us','MainController@contact_us')->name('contact_us');
Route::get('/articles/{slug}','ArticleController@show')->name('articles.slug');
Route::get('/articles','ArticleController@index')->name('articles');
Route::get('/','MainController@index');
Route::get('/welcome','MainController@index');
Route::patch('/searches','MainController@search');
Route::any('(:any)/(:all?)','MainController@index');

Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::post('/remove-item/{id}', 'CartController@removeItem')->name('cart.remove');
Route::get('/cart', 'CartController@getCart')->name('cart.cart');
