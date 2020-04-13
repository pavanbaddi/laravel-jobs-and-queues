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
