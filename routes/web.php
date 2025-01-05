<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GameMakerController;
use App\Http\Controllers\GameMakerNextController;
use App\Http\Controllers\GameNextEditController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashBoardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');
Route::POST('/dashboard/store', [App\Http\Controllers\DashBoardController::class, 'store'])
->middleware(['auth', 'verified'])->name('dashboard.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    Route::resource('tasks', TaskController::class);
//    Route::get('/tasks/{task}/mark-completed', [TaskController::class, 'markCompleted'])->name('tasks.mark-completed');
//    Route::get('/tasks/{task}/mark-uncompleted', [TaskController::class, 'markUncompleted'])->name('tasks.mark-uncompleted');

    Route::resource('game', GameMakerController::class);
    Route::POST('/post/upload', [GameMakerController::class, 'upload'])->name('post.upload');

    Route::get('/game_maker_next/{title}/{prev_id}', [GameMakerNextController::class, 'index'])->name('game_maker_next');
    Route::POST('/game_maker_next/store', [GameMakerNextController::class, 'store'])->name('game_maker_next.store');
    Route::POST('/game_maker_next/finish', [GameMakerNextController::class, 'finish'])->name('game_maker_next.finish');
    Route::POST('/game_maker_next/save/{prev_id}', [GameMakerNextController::class, 'save'])->name('game_maker_next.save');
    //Route::get('/game_maker_next/show/{id}', [GameMakerNextController::class, 'show'])->name('game_maker_next.show');
    //Route::get('/game_maker_next/edit/{id}', [GameMakerNextController::class, 'edit'])->name('game_maker_next.edit');
    //Route::POST('/game_maker_next/update/{id}', [GameMakerNextController::class, 'update'])->name('game_maker_next.update');
    //Route::get('/game_maker_next/editnext/{prev_id}', [GameMakerNextController::class, 'editnext'])->name('game_maker_next.editnext');
    //Route::POST('/game_maker_next/editnextupdate/{prev_id}', [GameMakerNextController::class, 'editnextupdate'])->name('game_maker_next.editnextupdate');
    Route::GET('/game_next_edit/{id}', [GameNextEditController::class, 'index'])->name('game_next_edit.index');
    Route::POST('/game_next_edit/first_update/{id}', [GameNextEditController::class, 'first_update'])->name('game_next_edit.first_update');
    Route::GET('/game_next_edit/edit/{prev_id}', [GameNextEditController::class, 'edit'])->name('game_next_edit.edit');
    Route::GET('/game_next_edit/show/{id}', [GameNextEditController::class, 'show'])->name('game_next_edit.show');
    Route::POST('/game_next_edit/update/{prev_id}', [GameNextEditController::class, 'update'])->name('game_next_edit.update');
    Route::DELETE('/game_next_edit/delete/{id}', [GameNextEditController::class, 'delete'])->name('game_next_edit.delete');

});

require __DIR__.'/auth.php';
