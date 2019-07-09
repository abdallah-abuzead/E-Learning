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
Route::post('/user-login','UserController@login');
Route::match(['get', 'post'],'/user-logout','UserController@logout'); 

Route::get('/home', 'HomeController@homeStudent')->name('home');
Route::get('/homeStudent', 'HomeController@homeStudent')->name('homeStu');
Route::get('/courses/{id}', 'CoursesController@show')->name('course');

Route::group(['middleware'=>['frontLogin']],function(){

Route::get('/homeInstructor', 'HomeController@homeInstructor')->name('homeIns');
Route::get('Courses/create' , 'HomeController@addCourses');


Route::get('/enrollCourse/{id}', 'CoursesController@enroll')->name('enroll');
Route::post('/storeVideo', 'CoursesController@storeVideo')->name('storevideo');
Route::get('/playVideo/{id}', 'CoursesController@playVideo')->name('playvideo');
});

Route::get('/storeComment' , 'CommentController@store');