<?php

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'viewController@pageLogin');
Route::resource('auth', 'AuthController');
//Route::post('doLogin', 'LoginController@authenticate');
/* --------------- Front End -------------------- */

Route::get('/listproject', 'viewController@pageListProject');
Route::get('/home', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');
Route::get('/estimage', 'viewController@pageEstimage');
Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');
Route::get('/upload', 'viewController@pageUpload');
Route::get('/dashboard', 'viewController@pageDashboard');
Route::get('/pageListProject', 'viewController@pageListProject');
Route::get('/projectlist', 'viewController@projectlist');


//Route::get('/login', 'HomeController@index')->name('home');
Route::post('/projectinfo_insert', 'ProjectController@insert');

// query database
Route::get('/projectlist', 'projectController@index')->name('project');
