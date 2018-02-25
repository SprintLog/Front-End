<?php


//Route::get('/home', 'HomeController@index')->name('home');


/* --------------- Login -------------------- */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/regiterAfter', 'HomeController@regiterAfter');
/* --------------- Front End -------------------- */

Route::get('/listproject', 'viewController@pageListProject');

Route::get('/homet', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');
Route::get('/estimage', 'viewController@pageEstimage');
Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');
Route::get('/upload', 'viewController@pageUpload');
Route::get('/dashboard', 'viewController@pageDashboard');
Route::get('/pageListProject', 'viewController@pageListProject');
Route::get('/projectlist', 'viewController@projectlist');

Route::resource('/projectinfo', 'ProjectController');
Route::get('/projectlist', 'projectController@show')->name('project');
Route::post('/projectlist_delete', 'ProjectController@delete');

//estmage
Route::get('/estimage', 'TcfController@show')->name('tcf','ecf');
Route::post('/estimage_update', 'TcfController@update');
