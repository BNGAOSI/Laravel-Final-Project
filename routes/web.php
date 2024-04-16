<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Models\Task; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Todo List Routes
    Route::get('/index', function () {
        $tasks = Task::all();
        return view('index', compact('tasks'));
    })->name('tasks.index');
    
    Route::get('/tasks/create', function () {
        return view('create');
    })->name('tasks.create');
    Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}/edit', [TodoController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TodoController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TodoController::class, 'destroy'])->name('tasks.destroy');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
