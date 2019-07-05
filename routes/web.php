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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/homeStudent', 'HomeController@homeStudent')->name('homeStu');
Route::get('/homeInstructor', 'HomeController@homeInstructor')->name('homeIns');
Route::get('/courses/{id}', 'CoursesController@show')->name('course');
Route::get('Courses/create' , 'HomeController@addCourses');