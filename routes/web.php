<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/',[TaskController::class, 'index'])->name('task.index');
    Route::resource('task', TaskController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('project', ProjectController::class);
});
