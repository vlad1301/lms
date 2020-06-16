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
/*Route::get('/logout', 'Auth\LoginController@logout');*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin_home')->name('admin.home');

Route::resource('users', 'UserController');
Route::get('/user/trashed', 'UserController@trashed')->name('users.trashed')->middleware('admincheck');
Route::get('/user/restore/{id}', 'UserController@restore')->name('users.restore')->middleware('admincheck');

Route::resource('questions', 'QuestionController');
Route::get('/question/trashed', 'QuestionController@trashed')->name('questions.trashed');
Route::get('/question/restore/{id}', 'QuestionController@restore')->name('questions.restore');
Route::get('/question/forceDelete/{id}', 'QuestionController@forceDelete')->name('questions.forceDelete');

Route::resource('courses', 'CourseController');
Route::get('/course/create', 'CourseController@create')->name('courses.create')->middleware('admincheck');
Route::get('/course/trashed', 'CourseController@trashed')->name('courses.trashed')->middleware('admincheck');
Route::get('/course/restore/{id}', 'CourseController@restore')->name('courses.restore')->middleware('admincheck');
Route::get('/course/forceDelete/{id}', 'CourseController@forceDelete')->name('courses.forceDelete')->middleware('admincheck');

Route::resource('lessons', 'LessonsController');
Route::get('/lesson/trashed', 'LessonsController@trashed')->name('lessons.trashed');
Route::get('/lesson/restore/{id}', 'LessonsController@restore')->name('lessons.restore');
Route::get('/lesson/forceDelete/{id}', 'LessonsController@forceDelete')->name('lessons.forceDelete');


Route::resource('tests', 'TestsController');
Route::get('/test/trashed', 'TestsController@trashed')->name('tests.trashed');
Route::get('/test/restore/{id}', 'TestsController@restore')->name('tests.restore');
Route::get('/test/forceDelete/{id}', 'TestsController@forceDelete')->name('tests.forceDelete');


Route::post('/test/courses', 'LessonsController@courses' )->name('lessons.courses');
Route::post('/test/lessons', 'LessonsController@lessons' )->name('lessons.lessons');
/*Route::post( '/get/cities', 'WorldController@cities' )->name( 'loadCities' );*/


Route::get('ajax',function() {
    return view('test.create');
});
Route::post('/getmsg','AjaxController@index');
