<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([

    ], function () {
        Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('/projects', App\Http\Controllers\ProjectsController::class);
        Route::patch('/tasks/{id}', [\App\Http\Controllers\TasksController::class, 'updateStatus'])->name('tasks.updateStatus');
        Route::resource('/tasks', App\Http\Controllers\TasksController::class);

    });

    Route::group([
//        'prefix' => 'admin',
        'middleware' => 'checkStatus:admin',
        'as' => 'admin.',
    ], function () {
        Route::resource('/categories', App\Http\Controllers\CategoriesController::class);
        Route::resource('/users', App\Http\Controllers\UsersController::class);
    });
});


require __DIR__.'/auth.php';
