<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GameMakerController;
use App\Http\Controllers\GameMakerNextController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    Route::resource('tasks', TaskController::class);
//    Route::get('/tasks/{task}/mark-completed', [TaskController::class, 'markCompleted'])->name('tasks.mark-completed');
//    Route::get('/tasks/{task}/mark-uncompleted', [TaskController::class, 'markUncompleted'])->name('tasks.mark-uncompleted');

    Route::resource('game', GameMakerController::class);
    Route::POST('/post/upload', [GameMakerController::class, 'upload'])->name('post.upload');

    Route::get('/game_maker_next/{prev_id}', [GameMakerNextController::class, 'index'])->name('game_maker_next');
    Route::POST('/game_maker_next/store', [GameMakerNextController::class, 'store'])->name('game_maker_next.store');
    Route::POST('/game_maker_next/finish', [GameMakerNextController::class, 'finish'])->name('game_maker_next.finish');
    Route::POST('/game_maker_next/save/{prev_id}', [GameMakerNextController::class, 'save'])->name('game_maker_next.save');
    Route::get('/game_maker_next/show/{id}', [GameMakerNextController::class, 'show'])->name('game_maker_next.show');
    Route::get('/game_maker_next/edit/{id}', [GameMakerNextController::class, 'edit'])->name('game_maker_next.edit');
    Route::POST('/game_maker_next/update/{id}', [GameMakerNextController::class, 'update'])->name('game_maker_next.update');
    Route::get('/game_maker_next/editnext/{prev_id}', [GameMakerNextController::class, 'editnext'])->name('game_maker_next.editnext');
    Route::POST('/game_maker_next/editnextupdate/{prev_id}', [GameMakerNextController::class, 'editnextupdate'])->name('game_maker_next.editnextupdate');

});

require __DIR__.'/auth.php';
