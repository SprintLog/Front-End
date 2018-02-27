<?php





/* --------------- Login -------------------- */
Auth::routes();

Route::get('/home', 'HomeController@index');

/* --------------- Front End -------------------- */

/* --------------- BACK End -------------------- */




Route::resource('/project', 'ProjectController');

Route::resource('/projectcreate', 'ProjectListController');



/* --------------- VIEW ONLY -------------------- */

Route::get('/listproject', 'viewController@pageListProject');
Route::get('/homet', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');
Route::get('/estimage', 'viewController@pageEstimage');
Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');
Route::get('/upload', 'viewController@pageUpload');
Route::get('/dashboard', 'viewController@pageDashboard');
<<<<<<< HEAD
=======
Route::get('/pageListProject', 'viewController@pageListProject');
Route::get('/projectlist', 'viewController@projectlist');

Route::resource('/projectinfo', 'ProjectController');
Route::get('/projectlist', 'projectController@show')->name('project');
Route::post('/projectlist_delete', 'ProjectController@delete');

//estmage
Route::get('/estimage', 'TcfController@show')->name('tcf','ecf');
Route::post('/estimage_update', 'TcfController@update');
>>>>>>> Mark
