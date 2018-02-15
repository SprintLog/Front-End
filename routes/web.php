<?php

Auth::routes();

<<<<<<< HEAD
//Route::get('/home', 'HomeController@index')->name('home');
=======
>>>>>>> dev-Army

/* --------------- Login -------------------- */
Route::get('/login', 'viewController@pageLogin');
Route::resource('auth', 'AuthController');

/* --------------- Front End -------------------- */

Route::get('/listproject', 'viewController@pageListProject');

Route::get('/home', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');

Route::get('/estimage', 'viewController@pageEstimage');
Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');
Route::get('/upload', 'viewController@pageUpload');
Route::get('/dashboard', 'viewController@pageDashboard');
<<<<<<< HEAD
Route::get('/pageListProject', 'viewController@pageListProject');

Auth::routes();

Route::get('/homeforlogin', 'HomeController@index')->name('home');
Route::post('/projectinfo_insert', 'ProjectController@insert');
=======


/* --------------- Back End -------------------- */
Route::post('/insert', 'TaskController@insert');
>>>>>>> dev-Army
