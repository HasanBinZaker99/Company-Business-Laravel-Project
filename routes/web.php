<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\PDF;

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
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::group(['prefix' => 'home', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index')->name('home');
    Route::get('profile', 'ProfileController@index')->name('profile.view');
    Route::patch('profile-update/{id}', 'ProfileController@update')->name('profile.update');
    Route::get('designation', 'DesignationController@index')->name('designation');
    Route::post('designation-add', 'DesignationController@store')->name('designation.store');
    Route::delete('designation-delete/{id}', 'DesignationController@destroy')->name('designation.destroy');
    Route::resource('teacher', 'TeacherController');
    Route::resource('notice-board', 'NoticeboardController');
    Route::get('single-notice-board/{id}', 'AdminController@singlenotice')->name('single-notice');
    Route::resource('course-add', 'CourseController');
    Route::resource('course-details', 'CourseDetailsController');
    Route::get('course', 'CourseViewController@index')->name('course-view');
    Route::get('course-information/{id}', 'CourseViewController@courseInfo')->name('course-information');
    Route::resource('batch', 'BatchController');
    Route::resource('teacher-assign', 'TeacherAssignController');
    Route::post('teacher-designation', 'TeacherAssignajaxController@teacherDesignation')->name('teacher-designation');
    Route::get('batch-list', 'BatchListController@index')->name('batch-list');
    Route::resource('admission', 'AdmissionController');
    Route::post('course-info', 'CourseApiController@coursePrice')->name('course-info');
    Route::get('admission-lists', 'AdmissionListsController@index')->name('admission-lists');
    Route::resource('student-panel', 'StudentPanelController');
    Route::post('student-details', 'CourseApiController@studentDetails')->name('student-details');
    Route::get('change-password', 'ChangePasswordController@index')->name('change-password');
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('change.password');
    Route::post('user-info', 'CourseApiController@userInfo')->name('user-info');
    Route::get('payment-received', 'PaymentReceivedController@index')->name('payment.index');
    Route::post('admission-details', 'CourseApiController@admissionDetails')->name('admission-details');
    Route::resource('accounts', 'AccountsController');
    Route::resource('settings', 'SettingsController');
    Route::get('student-email', 'StudentEmailController@index')->name('student-email');
    Route::post('student-email-send', 'StudentEmailController@sendMail')->name('student.email.send');
    Route::get('class', 'ClassController@index')->name('class.index');
    Route::get('class-details/{id}', 'ClassController@show')->name('class.show');
    Route::resource('role-permission', 'RoleandPermissionController');
    Route::resource('user-create', 'UserCreateController');
});
