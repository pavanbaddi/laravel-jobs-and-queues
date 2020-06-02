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

Route::get('countries-census/process', 'CountryController@process');
Route::get('email/preview', 'HomeController@previewEmail');
Route::get('email/send', 'HomeController@sendEmailSynchronously');
Route::get('email/send-via-queued', 'HomeController@sendEmailQueued');

// Send Attachment
Route::get('email/send-with-attachment', 'HomeController@sendEmailWithAttachment');
Route::get('email/send-with-multiple-attachments', 'HomeController@sendEmailWithMultipleAttachments');
Route::get('email/email-of-subscription-renewal', 'HomeController@emailOfSubscriptionRenewal');

// Form Validation
Route::get('contact-us', 'HomeController@contactUs');
Route::post('contact-us/send', 'HomeController@sendContactUsMessage'); 

Route::get('company/profile', 'HomeController@companyProfile'); 
Route::post('company/profile/save', 'HomeController@saveCompanyProfile');


Route::get('user/profile', 'HomeController@userProfileForm');
Route::post('user/profile/save', 'HomeController@saveUserProfileForm');

// Live Wire Counter App
Route::get('counter', function(){
    return view('livewire.counter-views.base', []);
});


// Livewire College login and registration routes
Route::get('college', function(){
    return view('livewire.college-login-register.base', []);
});


// Livewire File Uploads
Route::get('files', function(){
    return view('livewire.files.base', []);
});

// https://stackoverflow.com/questions/50020636/in-laravel-npm-run-dev-errors
// Livewire Todo Application Routes
Route::get('todo', function(){
    return view('livewire.todo.base', []); 
});
 


Route::group(['prefix' => "ecom"], function () {
    Route::livewire('/', 'ecommerce.home')->name('ecommerce.home');
    Route::livewire('/products', 'ecommerce.product.list-component')->name('ecommerce.product.list');
    Route::livewire('/product/create', 'ecommerce.product.form-component')->name('ecommerce.product.form');
    Route::livewire('/product/edit/{product_id}', 'ecommerce.product.form-component')->name('ecommerce.product.edit');
    Route::livewire('/cart-items', 'ecommerce.cart-component')->name('ecommerce.cart-items');
});


// Category and Subcategory Routes
Route::get('category-subcategory/list', 'CategoryController@index')->name('category-subcategory.list');
Route::post('category-subcategory/save-nested-categories', 'CategoryController@saveNestedCategories')->name('category-subcategory.save-nested-categories');

Route::get('category-subcategory/create', 'CategoryController@create')->name('category-subcategory.create');
Route::post('category-subcategory/save', 'CategoryController@store')->name('category-subcategory.store');
Route::get('category-subcategory/edit/{category_id}', 'CategoryController@edit')->name('category-subcategory.edit');
Route::get('category-subcategory/remove/{category_id}', 'CategoryController@remove')->name('category-subcategory.remove');
 

// Remember Me

Route::get('remember-me/login', 'LoginController@index')->name('remember-me.login');
Route::post('remember-me/login/verify', 'LoginController@verify')->name('remember-me.login-verify');
Route::get('remember-me/dashboard', 'DashboardController@index')->name('dashboard');