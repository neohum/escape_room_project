<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GameMakerController;
use App\Http\Controllers\GameMakerNextController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/mark-completed', [TaskController::class, 'markCompleted'])->name('tasks.mark-completed');
    Route::get('/tasks/{task}/mark-uncompleted', [TaskController::class, 'markUncompleted'])->name('tasks.mark-uncompleted');

    Route::resource('game', GameMakerController::class);
    Route::get('/game_maker_next/{prev_id}', [GameMakerNextController::class, 'index'])->name('game_maker_next');
    Route::POST('/post/upload', [GameMakerController::class, 'upload'])->name('post.upload');

});

require __DIR__.'/auth.php';
