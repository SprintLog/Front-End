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


/* --------------- BACK END -------------------- */
Route::resource('/projectinfo', 'ProjectController');
Route::get('/projectInfoRegis', 'viewController@pageProjectInfoRegis');
