<?php

Auth::routes();




/* --------------- Front End -------------------- */

Route::get('/listproject', 'viewController@pageListProject');

Route::get('/home', 'viewController@pageHome');
Route::get('/projectinfo', 'viewController@pageprojectInfo');
Route::get('/planing', 'viewController@pagePlaning');

Route::get('/estimage', 'viewController@pageEstimage');
Route::get('/kanbanBoard', 'viewController@pageKanbanBoard');
Route::get('/upload', 'viewController@pageUpload');
Route::get('/dashboard', 'viewController@pageDashboard');


/* --------------- Back End -------------------- */
Route::post('/insert', 'TaskController@insert');
