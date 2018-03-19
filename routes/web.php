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

Route::get('autocomplete-ajax',
   array('as'=>'autocomplete.ajax',
   'uses'=>'ProjectListController@ajaxData'));
