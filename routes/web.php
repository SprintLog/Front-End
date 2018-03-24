<?php
/* --------------- Login -------------------- */
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/project', 'ProjectController');
Route::resource('/projectlist', 'ProjectListController');
Route::resource('/estimage', 'EffortEstimationsController')->name('tcf','ecf');
Route::post('/estimage_updateall', 'EffortEstimationsController@updateAll'); // Upadete All Only
// Upadete All Only
Route::post('/estimage_updateall', 'EffortEstimationsController@updateAll');

//for upload and download
Route::post('/upload/file', 'UploadController@uploadDocument');
Route::get('/upload', 'UploadController@index');
Route::get('/download/{filename}', 'UploadController@downloadDocument');
Route::get('/like/{id}', 'PostController@like');
Route::post('/post/new', 'PostController@post');

//for add task
// Route::get('/addTask', 'TaskController@index')->name('tasks');
// Route::post('/task', 'TaskController@insert');
// Route::delete('/task/{task}' , 'TaskController@destroy');
Route::resource('/task', 'TaskController');
Route::resource('/dashboard', 'DashboardController');

Route::get('autocomplete-ajaxStd',
   array('as'=>'autocomplete.ajax.std',
   'uses'=>'AutoComplateController@ajaxDataStd'));
//for sub task
Route::get('/subTask/{id}', 'SubTaskController@index');
Route::post('/subTask/create', 'SubTaskController@store');
Route::delete('/subTask/{id}', 'SubTaskController@destroy');
Route::get('/subTask/completed/{id}', 'SubTaskController@completed');


//showdashboard
Route::resource('/dashboard', 'DashboardController');
/* --------------- VIEW ONLY -------------------- */

Route::get('autocomplete-ajaxLec',
   array('as'=>'autocomplete.ajax.lec',
   'uses'=>'AutoComplateController@ajaxDataLec'));


Route::get('/listproject', 'viewController@pageListProject');
Route::get('/homet', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');

Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');

//Route::get('/upload', 'viewController@pageUpload');
//Route::get('/dashboard', 'viewController@pageDashboard');
