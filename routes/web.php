<?php





/* --------------- Login -------------------- */
Auth::routes();

Route::get('/home', 'HomeController@index');

/* --------------- Front End -------------------- */

/* --------------- BACK End -------------------- */




Route::resource('/project', 'ProjectController');
Route::resource('/projectlist', 'ProjectListController');



/* --------------- VIEW ONLY -------------------- */

Route::get('/listproject', 'viewController@pageListProject');
Route::get('/homet', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');
Route::get('/estimage', 'viewController@pageEstimage');
Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');
Route::get('/upload', 'viewController@pageUpload');
Route::get('/dashboard', 'viewController@pageDashboard');
