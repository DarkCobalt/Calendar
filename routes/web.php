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

Route::get('/calendar', 'CalendarController@getIndex');
Route::get('/calendar/edit-calendar/{id?}', 'CalendarController@getEditCalendar');
Route::post('/calendar/edit-calendar/{id?}', 'CalendarController@postEditCalendar');

Route::get('/calendar/add-event', 'CalendarController@getAddEvent');
Route::post('/calendar/add-event', 'CalendarController@postAddEvent');