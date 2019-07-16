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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homeStudent', 'HomeController@homeStudent')->name('homeStu');
Route::get('/courses/{id}', 'CoursesController@show')->name('course');
Route::get('/student-profile/{id}', 'StudentController@show')->name('studentProfile');

Route::get('/student-profile-edit/{id}', 'StudentController@edit')->name('studentProfileEdit');
Route::post('/student-profile-save/{id}', 'StudentController@update')->name('studentProfileSave');
////////////////////////////// exam
Route::get('/add-exam', 'ExamController@create')->name('createExam');
//Route::post('/add-questions', 'ExamController@store')->name('storeExam-addQuestions');
Route::post('/store-question', 'ExamController@storeQuestion')->name('storeQuestion');
Route::get('/add-questions', 'ExamController@store')->name('storeExam-addQuestions');
Route::get('/delete-question/{id}', 'ExamController@deleteQuestion')->name('deleteQuestion');
////////////////////////////// end exam

Route::group(['middleware'=>['frontLogin']], function() {
Route::get('/homeInstructor', 'HomeController@homeInstructor')->name('homeIns');
Route::get('Courses/create' , 'HomeController@addCourses');

Route::get('Courses/create' , 'CoursesController@create');
Route::post('/Courses/create' , 'CoursesController@store');
Route::get('Courses/update/{id}' , 'CoursesController@edit');
Route::post('Courses/update/{id}' , 'CoursesController@update');
Route::get('/deleteCourse/{id}' , 'CoursesController@destroy');



Route::post('/storeDescription', 'DescriptionController@store')->name('storedescription');
Route::get('/editDescription/{id}', 'DescriptionController@edit')->name('editdescription');
Route::post('/updateDescription/{id}', 'DescriptionController@update')->name('updatedescription');
Route::get('/deleteDescription/{id}', 'DescriptionController@destroy')->name('deletedescription');

Route::get('/enrollCourse/{id}', 'CoursesController@enroll')->name('enroll');

Route::post('/storeVideo', 'VideoController@storeVideo')->name('storevideo');
Route::get('/playVideo/{id}', 'VideoController@playVideo')->name('playvideo');
Route::get('/playPreviousVideo/{id}', 'VideoController@playPreviousVideo')->name('playpreviousvideo');
Route::get('/playNextVideo/{id}', 'VideoController@playNextVideo')->name('playnextvideo');
Route::get('/deleteVideo/{id}', 'VideoController@destroyVideo');

Route::post('/storeComment' , 'CommentController@store')->name('storecomment');
Route::get('/deleteComment/{id}' , 'CommentController@destroy')->name('destroycomment');
Route::post('/updateComment/{id}' , 'CommentController@update')->name('updatecomment');

Route::get('/createExam', 'ExamController@create')->name('createexam');
Route::get('/deleteExam', 'ExamController@distroy')->name('deleteexam');
Route::get('/startExam/{course_id}', 'ExamController@show')->name('startexam');

});

Route::get('search', 'CoursesController@search')->name('search');

// Route::get('/deleteCourse/{id}' , 'CoursesController@destroy');