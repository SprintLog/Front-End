<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* --------------- Front End -------------------- */

Route::get('/home', 'viewController@pageHome');
