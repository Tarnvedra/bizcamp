<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// projects
Route::group(['middleware' => 'auth'], function () {
    Route::post('/project/store', [ProjectsController::class, 'store'])->name('create.project');
    Route::get('/project/{project}', [ProjectsController::class, 'show'])->name('show.project');
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
});


