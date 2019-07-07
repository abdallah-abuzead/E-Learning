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
    return redirect('/home');
});

Auth::routes();
Route::group(['middleware'=>['goHome']],function(){
Route::get('/user-login','UserController@loginPage');
Route::get('/user-register','UserController@registerPage');
Route::get('/login','UserController@loginPage'); // a5er precedence ll route howa ely bytnfez
Route::get('/register','UserController@registerPage');
});

Route::post('/user-register','UserController@register');
Route::post('user-login','UserController@login');
Route::get('/user-logout','UserController@logout'); 

Route::group(['middleware'=>['frontLogin']],function(){
Route::get('/home', 'HomeController@homeStudent')->name('home');
Route::get('/homeStudent', 'HomeController@homeStudent')->name('homeStu');
Route::get('/homeInstructor', 'HomeController@homeInstructor')->name('homeIns');
Route::get('/courses/{id}', 'CoursesController@show')->name('course');
Route::get('Courses/create' , 'HomeController@addCourses');
});