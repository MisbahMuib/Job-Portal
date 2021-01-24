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


use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Job Profile
Route::get('/', 'JobController@index');
Route::get('/jobs/{id}/{slug}','JobController@show')->name('jobs.show');
Route::get('/jobs/create','JobController@create')->name('jobs.create');
Route::post('/jobs/store','JobController@store')->name('jobs.store');
Route::get('/jobs/myjobs','JobController@myjobs')->name('jobs.myjobs');
Route::post('/jobs/apply/{id}','JobController@apply')->name('jobs.apply');
Route::get('/jobs/applicants','JobController@applicants');
Route::get('/jobs/alljobs','JobController@alljobs')->name('jobs.alljobs');
// Company Profile
Route::get('/company/{id}/{slug}','CompanyController@index')->name('company.index');
Route::get('/company/create','CompanyController@create')->name('company.create');
Route::post('/company/logo','CompanyController@logo')->name('company.logo');
Route::post('/company/store','CompanyController@store')->name('company.store');
Route::post('/company/coverphoto','CompanyController@coverphoto')->name('company.coverphoto');

// user Profile
Route::get('user/profile','UserProfileController@index')->name('user.profile');
Route::post('profile/store','UserProfileController@store')->name('profile.store');
Route::post('profile/coverletter','UserProfileController@coverletter')->name('profile.coverletter');
Route::post('profile/resume','UserProfileController@resume')->name('profile.resume');
Route::post('profile/avatar','UserProfileController@avatar')->name('profile.avatar');

// Employer Profile

Route::view('employer/profile','auth.emp_register')->name('employer.register');
Route::post('employer/store','EmployerRegisterController@store')->name('employer.store');
