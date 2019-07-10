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
Route::group(['middleware'=>['goHome']], function() {
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
Route::get('/student-profile/{id}', 'StudentController@show')->name('studentProfile');
Route::post('/student-profile-edit/{id}', 'StudentController@edit')->name('studentProfileEdit');
Route::post('/student-profile-save/{id}', 'StudentController@update')->name('studentProfileSave');

Route::group(['middleware'=>['frontLogin']], function() {
    Route::get('/homeInstructor', 'HomeController@homeInstructor')->name('homeIns');
    Route::get('Courses/create' , 'HomeController@addCourses');

<<<<<<< HEAD
    Route::get('/enrollCourse/{id}', 'CoursesController@enroll')->name('enroll');
    Route::post('/storeVideo', 'CoursesController@storeVideo')->name('storevideo');
    Route::get('/playVideo/{id}', 'CoursesController@playVideo')->name('playvideo');
=======
Route::get('/homeInstructor', 'HomeController@homeInstructor')->name('homeIns');

Route::get('Courses/create' , 'CoursesController@create');
Route::post('/Courses/create' , 'CoursesController@store');

=======
Route::get('Courses/create' , 'HomeController@addCourses');
Route::get('/deleteCourse/{id}' , 'CoursesController@destroy');



Route::get('/enrollCourse/{id}', 'CoursesController@enroll')->name('enroll');
Route::post('/storeVideo', 'VideoController@storeVideo')->name('storevideo');
Route::get('/playVideo/{id}', 'VideoController@playVideo')->name('playvideo');
Route::get('/playPreviousVideo/{id}', 'VideoController@playPreviousVideo')->name('playpreviousvideo');
Route::get('/playNextVideo/{id}', 'VideoController@playNextVideo')->name('playnextvideo');
Route::get('/deleteVideo/{id}' , 'VideoController@destroyVideo');
>>>>>>> 81576c669c8714ff873ca66a65ef5f0aaa13cf51
});

Route::get('/deleteCourse/{id}' , 'CoursesController@destroy');
Route::get('/storeComment' , 'CommentController@store');