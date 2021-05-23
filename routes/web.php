<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::redirect('/', 'welcome');

Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::get('getsite/{seitenid}', [App\Http\Controllers\ShowPage::class, "showmarkdown"])->name("das_ist_test");


Route::group(['middleware' => 'auth'], function () {
    //////////////7 Logged in Area


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => '\App\Http\Middleware\IsAdmin::class'], function () {
        //////////////// Admin Area


        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
        Route::resource('users', \App\Http\Controllers\Admin\users\UserController::class);
        // Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
        // Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        // Route::post('images', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('images.store');
    });
});
