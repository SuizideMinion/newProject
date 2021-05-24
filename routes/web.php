<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::get('getsite/{seitenid}', [App\Http\Controllers\ShowPage::class, "showmarkdown"])->name("das_ist_test");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    //////////////7 Logged in Area


    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => '\App\Http\Middleware\IsAdmin::class'], function () {
        //////////////// Admin Area


        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
        Route::resource('users', \App\Http\Controllers\Admin\users\UserController::class);
        Route::resource('logfiles/{group?}', \App\Http\Controllers\Admin\LogController::class);
        // Route::get('logfiles/{offset?}', [\App\Http\Controllers\Admin\LogController::class, "index"])->where('offset', '[1-9]\d*');
    });
});
