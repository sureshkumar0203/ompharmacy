<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('ccavResponseHandler', 'PaymentsController@paymentResponse');


/*******Application API******/
Route::get('home_user_photo', 'ApiController@homeUserPhoto');
Route::get('user_sign_up_otp', 'ApiController@userSignupOtp');
Route::post('user_sign_up', 'ApiController@userSignup');
Route::get('user_login', 'ApiController@userLogin');
Route::get('user_logout', 'ApiController@userLogout');
Route::get('user_forgot_password_otp', 'ApiController@userForgotPasswordOtp');
Route::get('user_forgot_password', 'ApiController@userForgotPassword');
Route::get('user_wallet_balance', 'ApiController@userWalletBalance');

Route::get('service_category_list', 'ApiController@getServiceCategoryList');
Route::get('service_list', 'ApiController@serviceList');

Route::post('book_service', 'ApiController@bookService');
Route::get('booking_cancellation', 'ApiController@bookingCancellation');
Route::get('booking_history', 'ApiController@bookingHistory');

Route::post('prescription_upload', 'ApiController@prescriptionUpload');
Route::get('prescription_upload_details', 'ApiController@prescriptionUploadDetails');
Route::get('prescription_delete', 'ApiController@prescriptionDelete');

Route::get('health_records', 'ApiController@healthRecords');
Route::get('pill_management', 'ApiController@pillManagement');
Route::get('health_activity', 'ApiController@healthActivity');
Route::get('payment_history', 'ApiController@paymentHistory');
Route::get('account_details', 'ApiController@accountDetails');
Route::post('transfer_money', 'ApiController@transferMoney');
Route::post('myaccount_update', 'ApiController@myaccountUpdate');
Route::get('user_details', 'ApiController@userDetails');
Route::post('upload_user_photo', 'ApiController@uploadUserPhoto');
Route::post('change_pwd','ApiController@changePassword');
Route::get('user_feedback', 'ApiController@userFeedback');


//Associate Login
Route::get('associate_login', 'ApiController@associateLogin');
Route::get('associate_forgot_password_otp', 'ApiController@associateForgotPasswordOtp');
Route::get('associate_forgot_password', 'ApiController@associateForgotPassword');
Route::get('associate_logout', 'ApiController@associateLogout');

Route::get('associate_service_listing', 'ApiController@associateServiceListing');
Route::get('associate_service_accept', 'ApiController@associateServiceAccept');
Route::get('associate_feedback', 'ApiController@associateFeedback');
Route::get('associate_booking_details', 'ApiController@associateBookingDetails');

Route::post('account-contact-us','ApiController@accountContactUs');
Route::post('contact-us','ApiController@contactUs');
Route::get('search-service','ApiController@searchService');



