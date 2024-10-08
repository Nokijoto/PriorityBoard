<?php

use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// TASKS
Route::get('tasks',[App\Http\Controllers\TaskController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('tasks');


Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{taskId}', [TaskController::class, 'show'])->name('tasks.show');
Route::put('tasks/{taskId}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{taskId}', [TaskController::class, 'delete'])->name('tasks.delete');

Route::get('tasks/{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');


// MATRIX
Route::get('matrix', [App\Http\Controllers\MatrixController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('matrix');



require __DIR__.'/auth.php';
