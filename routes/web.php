<?php





/* --------------- Login -------------------- */
Auth::routes();

Route::get('/home', 'HomeController@index');

/* --------------- Front End -------------------- */

/* --------------- BACK End -------------------- */




Route::resource('/project', 'ProjectController');

Route::resource('/projectcreate', 'ProjectListController');

Route::resource('/estimage', 'EffortEstimationsController')->name('tcf','ecf');
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



//showdashboard
Route::resource('/dashboard', 'DashboardController');
/* --------------- VIEW ONLY -------------------- */



Route::get('/listproject', 'viewController@pageListProject');
Route::get('/homet', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');

Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');

//Route::get('/upload', 'viewController@pageUpload');
//Route::get('/dashboard', 'viewController@pageDashboard');
