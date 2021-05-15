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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => '\App\Http\Middleware\IsAdmin::class'], function () {
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
        // Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroupController::class);
        // Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
        // Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
        // Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        // Route::post('images', [\App\Http\Controllers\Admin\ImageController::class, 'store'])->name('images.store');
    });
});
