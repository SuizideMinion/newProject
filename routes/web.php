<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
  return view('welcome');
});

Route::get('getsite/{seitenid}', [App\Http\Controllers\ShowPage::class, "showmarkdown"])->name("das_ist_test");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dog', [\App\Http\Controllers\DogsController::class, 'public']);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => '\App\Http\Middleware\IsLocked::class'], function () {
    //////////////7 Logged in Area
    Route::get('/chats/{channel}', [\App\Http\Controllers\Admin\ChatsController::class, 'index']);

      Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => '\App\Http\Middleware\IsAdmin::class'], function () {
        //////////////// Admin Area

        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
        Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
        Route::patch('users/update/{id}',[App\Http\Controllers\Admin\users\UserController::class, 'updateBanReason']);
        Route::get('users/unlock/{id}',[App\Http\Controllers\Admin\users\UserController::class, 'unlockUser']);
        Route::resource('users', \App\Http\Controllers\Admin\users\UserController::class);
        Route::get('logfiles/{group}', [App\Http\Controllers\Admin\LogController::class, 'index']);
        Route::get('logfiles/', [App\Http\Controllers\Admin\LogController::class, 'index']);
        Route::resource('dogs', \App\Http\Controllers\DogsController::class);
        Route::resource('menuitem', \App\Http\Controllers\MenuItemController::class);
        Route::resource('submenuitem', \App\Http\Controllers\SubMenuItemsController::class);

      });
    });
});

Route::resource('/locked', App\Http\Controllers\isLocked::class);
