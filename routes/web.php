<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[TaskController::class, 'index'])->name('task.index');

Route::resource('task', TaskController::class);
Route::resource('category', CategoryController::class);
