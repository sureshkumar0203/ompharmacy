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


Route::get('/', 'HomeController@index');
Route::post('sendOtp', 'AjaxController@sendOtp');
Route::post('user-signup', 'AjaxController@userSignup'); 
Route::post('resendotp', 'AjaxController@resendOtp');
Route::post('forgototp', 'AjaxController@forgotOtp');
Route::post('resendotpforgot', 'AjaxController@resendOtpForgot');
Route::post('user-forgot', 'AjaxController@userForgot');
Route::post('user-signin', 'AjaxController@userSignin');
Route::get('user-logout', 'AjaxController@userLogoout');
Route::get('pages/{param1}', 'HomeController@CmsContent');
Route::get('myaccount', 'HomeController@myaccount')->Middleware('CheckUserLogin');
Route::post('myaccount', 'HomeController@updateMyaccount')->Middleware('CheckUserLogin');
Route::get('change-password', 'HomeController@changePassword')->middleware('CheckUserLogin');
Route::post('user-change-password', 'HomeController@userChnagePassword')->middleware('CheckUserLogin');
Route::get('add-money', 'PaymentsController@addMoney')->middleware('CheckUserLogin');
Route::post('add-money', 'PaymentsController@payNow')->middleware('CheckUserLogin');
Route::get('payment-history', 'PaymentsController@paymenthistory')->middleware('CheckUserLogin');
Route::get('booking-history', 'PaymentsController@bookingHistory')->middleware('CheckUserLogin');
Route::post('checkRemaining', 'PaymentsController@checkBalance')->middleware('CheckUserLogin');
Route::post('getMoreContent', 'PaymentsController@getMoreContent')->middleware('CheckUserLogin');
Route::get('about', 'HomeController@about');
Route::get('contact', 'HomeController@contact');
Route::post('contact', 'AjaxController@sendMail');
Route::get('blog', 'HomeController@blog');
Route::get('blog/{slug}', 'HomeController@blogDetails');
Route::post('postcomment', 'AjaxController@postComment');
Route::get('our-services/{slug}', 'HomeController@cmsPage');
Route::get('our-services/category/{slug}', 'HomeController@servicesCategory');
Route::get('services', 'HomeController@services');
Route::get('booking-service/{id}', 'BookingController@bookingService')->middleware('CheckUserLogin');
Route::post('changedate', 'BookingController@changeDate')->middleware('CheckUserLogin');
Route::post('booking-service', 'BookingController@sendRequest')->middleware('CheckUserLogin');
Route::get('video', 'HomeController@video');
Route::get('prescription-upload', 'PrescriptionUploadController@index')->middleware('CheckUserLogin');
Route::get('prescription-upload/{id}/delete', 'PrescriptionUploadController@deletePrescription')->middleware('CheckUserLogin');
Route::get('prescription-upload-details', 'PrescriptionUploadController@prescriptionDetails')->middleware('CheckUserLogin');
Route::post('prescription-upload', 'PrescriptionUploadController@prescriptionUpload')->middleware('CheckUserLogin');
Route::post('/viewFeedback', 'PrescriptionUploadController@viewFeedback')->middleware('CheckUserLogin');
Route::post('/playVideo', 'HomeController@playVideo');

Route::get('request-cancellation', 'PaymentsController@requestCancellation')->middleware('CheckUserLogin');
Route::get('transfer', 'HomeController@transfer')->middleware('CheckUserLogin');
Route::post('transfer', 'AjaxController@transfer')->middleware('CheckUserLogin');
Route::post('account-details', 'AjaxController@accountDetails')->middleware('CheckUserLogin');
Route::get('health-records', 'HomeController@healthRecords')->middleware('CheckUserLogin');
Route::get('search-measurement', 'HomeController@searchMeasurement')->middleware('CheckUserLogin');
Route::get('user-payment-process', 'HomeController@showPayment')->middleware('CheckUserLogin');
Route::post('user-payment-process', 'HomeController@userPaymentProcess')->middleware('CheckUserLogin');
Route::get('pill-management', 'HomeController@pillManagement')->middleware('CheckUserLogin');
Route::get('health-activity', 'HomeController@healthActivity')->middleware('CheckUserLogin');

//User Feedback
Route::post('user-feedback', 'PaymentsController@userFeedback')->middleware('CheckUserLogin');

Route::get('404', 'HomeController@errorPage');
Route::get('book-error', 'HomeController@bookError');

//Cron job
Route::get('pill-reminder', 'HomeController@pillReminder');
Route::get('refill-remainder', 'HomeController@refillReminder');

// Route::get('push-notification', 'HomeController@pushNotification');
################# Admin Routes ####################


Route::group(['middleware' => 'PermissionManager'], function() {
	Auth::routes();
	Route::get('/administrator', 'AdminController@checkLogin');
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
	Route::get('/administrator/home', 'AdminController@index');
	Route::get('/administrator/my-account', 'AdminController@myAccount');
	Route::post('/my-account', 'AdminController@myaccountUpdate');
	Route::get('/administrator/change-password', 'AdminController@changePassword');
	Route::post('/change-password', 'AdminController@passwordUpdate');
	Route::resource('administrator/banners', 'BannerController');
	Route::resource('administrator/testimonials', 'TestimonialsController');
	Route::get('/administrator/about-content', 'AdminController@aboutContent');
	Route::post('/about-content', 'AdminController@updateAboutContent');
	Route::get('/administrator/featured', 'AdminController@viewFeatured');
	Route::post('/featured', 'AdminController@updateFeatured');
	Route::resource('administrator/video', 'VideoController');
	Route::resource('administrator/blogs', 'BlogController');
	Route::get('/administrator/blog-comment', 'AdminController@blogComment');
	Route::get('/administrator/change-ststus/{id}', 'AdminController@changeStatus');
	Route::get('/administrator/blog-comment/{id}/delete', 'AdminController@deleteBlogComment');

	Route::get('/administrator/associate-registration', 'LabRegistrationController@associateRegistration');
	Route::get('/administrator/associate-registration/create', 'LabRegistrationController@viewAssociateRegistration');
	Route::post('associate-registration', 'LabRegistrationController@saveAssociateRegistration');
	Route::get('/administrator/associate-registration/{id}/edit', 'LabRegistrationController@editAssociateRegistration');
	Route::post('update-associate-registration', 'LabRegistrationController@updateAssociateRegistration');
	Route::get('/administrator/associate-registration/{id}/delete', 'LabRegistrationController@deleteAssociateRegistration');
	Route::get('/administrator/associate-registration/{id}/view', 'LabRegistrationController@viewAssociate');
	Route::get('/administrator/associate-registration/change-ststus/{id}', 'LabRegistrationController@associateChangeStatus');

	Route::resource('administrator/measurement-types', 'MeasurementTypeController');

	Route::get('administrator/measurement/{id}', [
	    'as' => 'measurement.show',
	    'uses' => 'MeasurementController@index'
	]);
	Route::get('administrator/measurement/create/{id}', [
	    'as' => 'measurement.add',
	    'uses' => 'MeasurementController@create'
	]);

	Route::get('administrator/pill-management/{id}', [
	    'as' => 'pill-management.show',
	    'uses' => 'PillManagementController@index'
	]);
	Route::get('administrator/pill-management/create/{id}', [
	    'as' => 'pill-management.add',
	    'uses' => 'PillManagementController@create'
	]);

	Route::get('administrator/health-activity/{id}', [
	    'as' => 'health-activity.show',
	    'uses' => 'HealthActivityController@index'
	]);
	Route::get('administrator/health-activity/create/{id}', [
	    'as' => 'health-activity.add',
	    'uses' => 'HealthActivityController@create'
	]);
	
	Route::resource('administrator/measurement', 'MeasurementController', ['except' => ['show', 'add']]);

	Route::resource('administrator/pill-management', 'PillManagementController', ['except' => ['show', 'add']]);

	Route::resource('administrator/health-activity', 'HealthActivityController', ['except' => ['show', 'add']]);
	
	Route::get('/administrator/customer', 'AdminController@customerListing');
	Route::get('/administrator/customer/details/{id}', 'AdminController@customerDetails');
	Route::get('/administrator/customer/{id}', 'AdminController@customerStatus');

	//Route::get('/administrator/customer/measurement/{id}', 'AdminController@customerMeasurement');

	Route::resource('administrator/cms-page', 'CmsPageController');
	Route::get('administrator/cms-ststus/{id}', 'AdminController@cmsStatus');
	Route::get('administrator/cms-page/{id}/delete', 'CmsPageController@destroy');
	Route::resource('administrator/our-team', 'OurTeamController');

	Route::get('administrator/page-content', 'AdminController@viewCms');
	Route::get('administrator/page-content/{id}/edit', 'AdminController@editViewCms');
	Route::post('update-page-content', 'AdminController@updateCms');

	Route::resource('administrator/services', 'ServicesController');

	Route::get('administrator/booking', 'AdminController@userBooking');
	Route::get('administrator/booking-details/{id}', 'AdminController@userBookingDetails');
	Route::get('administrator/admin-booking', 'AdminController@adminBooking');
	Route::post('administrator/approve-admin', 'AdminController@approveAdmin');
	Route::get('administrator/booking/asso-detail/{id}', 'AdminController@associateSentDetail');

	Route::get('administrator/prescription/prescription-uploaded', 'AdminController@prescriptionUploaded');

	Route::post('administrator/assign-associate', 'AdminController@assignAssociate');

	Route::get('administrator/transfer', 'AdminController@transfer');

	Route::post('administrator/feedback', 'AdminController@feedBack');
	Route::post('administrator/associate_details', 'AdminController@associateDetails');
	Route::post('administrator/adminTransfer', 'AdminController@adminTransfer');
	Route::post('administrator/transferDetails', 'AdminController@transferDetail');

	Route::get('administrator/subadmin', 'AdminController@subAdmin');
	Route::get('administrator/subadmin/create', 'AdminController@createsubAdmin');
	Route::post('administrator/subadmin/create', 'AdminController@savesubAdmin');
	Route::get('administrator/subadmin/{id}/edit', 'AdminController@editViewsubAdmin');
	Route::post('administrator/subadmin/update', 'AdminController@updatesubAdmin');
	Route::get('administrator/subadmin/{id}/delete', 'AdminController@deleteSubAdmin');

	Route::get('administrator/subadmin/{id}/permit', 'AdminController@permitSubAdmin');
	Route::post('administrator/subadmin/permit', 'AdminController@assignPermit');
	Route::post('administrator/subadmin/permit', 'AdminController@assignPermit');
	Route::post('administrator/fetchGivenPermissions', 'AdminController@fetchGivenPermissions');
	Route::get('administrator/subadmin/change-ststus/{id}', 'AdminController@subadminChangeStatus');

	//Admin feedback
	Route::post('administrator/submit-feedback', 'RatingReviewController@adminFeedback');
});