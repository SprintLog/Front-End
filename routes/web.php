<?php
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::group(['middleware' => ['MustBeStudent']], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('/project', 'ProjectController');
    Route::resource('/projectlist', 'ProjectListController');
    Route::resource('/estimage', 'EffortEstimationsController')->name('tcf','ecf');
    Route::post('/estimage_updateall', 'EffortEstimationsController@updateAll'); // Upadete All Only
    // Upadete All Only
    Route::post('/estimage_updateall', 'EffortEstimationsController@updateAll');
    //for upload and download
    Route::post('/estimage_updateall', 'EffortEstimationsController@updateAll');
    Route::post('/upload/file/{id}', 'UploadController@uploadDocument');
    Route::post('/upload/delete', 'UploadController@deleteDocument');
    Route::post('/upload/image', 'UploadController@uploadImage');
    Route::resource('/upload', 'UploadController');
    Route::get('/download/{filename}', 'UploadController@downloadDocument');
    Route::get('/like/{id}', 'PostController@like');
    Route::post('/post/new', 'PostController@post');
    Route::resource('/task', 'TaskController');
    Route::resource('/dashboard', 'DashboardController');
    //for sub task
    Route::get('subTask/{id}', 'SubTaskController@index');
    Route::post('subTask/create', 'SubTaskController@store');
    Route::delete('subTask/{id}', 'SubTaskController@destroy');
    Route::get('subTask/completed/{id}', 'SubTaskController@completed');
    Route::put('subTask/update', 'SubTaskController@update');
  });

  Route::group(['middleware' => ['MustBeTeacher']], function () {
    //for Teacher
    Route::get('/homeTeacher','HomeController@indexTeacher');
    Route::resource('/projectTeacher', 'ProjectTeacherController');
    Route::post('/uploadDoc/file', 'UploadTeacherController@uploadDocument');
    Route::post('/uploadTeacher/delete', 'UploadTeacherController@deleteDocument');
    Route::get('/uploadTeacher', 'UploadTeacherController@index');
    Route::get('/downloadDoc/{filename}', 'UploadTeacherController@downloadDocument');

    Route::resource('/uploadTeacher', 'uploadTeacherController');
    Route::resource('/progress', 'ProgressController');
    Route::post('progress/approve', 'ProgressController@updateProgress');
    Route::resource('/subTask/teacher', 'SubtaskTeacherController');
    Route::get('/like/{id}', 'CommentController@like');
    Route::post('/comment/new', 'CommentController@post');
  });



  //showdashboard
  Route::resource('/dashboard', 'DashboardController');
  Route::resource('/kanbanBoard', 'KanbanBoardController');


});

Route::get('autocomplete-ajaxStd',
   array('as'=>'autocomplete.ajax.std',
   'uses'=>'AutoComplateController@ajaxDataStd'));

Route::get('autocomplete-ajaxLec',
   array('as'=>'autocomplete.ajax.lec',
   'uses'=>'AutoComplateController@ajaxDataLec'));

//for sub task
Route::get('subTask/{id}', 'SubTaskController@index');
Route::post('subTask/create', 'SubTaskController@store');
Route::delete('subTask/{id}', 'SubTaskController@destroy');
Route::get('subTask/completed/{id}', 'SubTaskController@completed');
Route::post('subTask/update', 'SubTaskController@update');

//showdashboard
Route::resource('/dashboard', 'DashboardController');
Route::resource('/kanbanBoard', 'KanbanBoardController');


Route::get('/document/{filename}', 'UploadController@downloadDocument1');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('task/update', 'TaskController@update');
