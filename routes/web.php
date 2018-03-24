<?php
/* --------------- Login -------------------- */
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/project', 'ProjectController');
Route::resource('/projectlist', 'ProjectListController');
Route::resource('/estimage', 'EffortEstimationsController')->name('tcf','ecf');
Route::post('/estimage_updateall', 'EffortEstimationsController@updateAll'); // Upadete All Only
Route::resource('/task', 'TaskController');
Route::resource('/dashboard', 'DashboardController');

Route::get('autocomplete-ajaxLectureStd',
   array('as'=>'autocomplete.ajax.std',
   'uses'=>'AutoComplateController@ajaxDataStd'));

Route::get('autocomplete-ajaxLectureLec',
   array('as'=>'autocomplete.ajax.lec',
   'uses'=>'AutoComplateController@ajaxDataLec'));
