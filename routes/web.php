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
