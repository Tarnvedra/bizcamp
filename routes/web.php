<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/project', [ProjectsController::class, 'store'])->name('create.project');
Route::get('/project', [ProjectsController::class, 'show'])->name('show.project');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
