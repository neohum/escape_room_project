<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GameMakerController;
use App\Http\Controllers\GameMakerNextController;
use App\Http\Controllers\GameNextEditController;
use App\Http\Controllers\FrontShowController;
use function Pest\Laravel\get;
use App\Http\Controllers\DashBoardController;

//Route::get('/', function () {
//    return GET('front_show.index', [FrontShowController::class, 'index']);
//});

Route::get('/', [FrontShowController::class, 'index']);
Route::GET('/show/show/{id}', [FrontShowController::class, 'show'])->name('show.show');
Route::GET('/show/show_next/{prev_id}', [FrontShowController::class, 'show_next'])->name('show.show_next');

Route::get('/dashboard', [DashBoardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');
Route::POST('/dashboard/store', [DashBoardController::class, 'store'])
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
    Route::GET('/game_next_edit/{id}', [GameNextEditController::class, 'index'])->name('game_next_edit.index');
    Route::POST('/game_next_edit/first_update/{id}', [GameNextEditController::class, 'first_update'])->name('game_next_edit.first_update');
    Route::GET('/game_next_edit/edit/{prev_id}', [GameNextEditController::class, 'edit'])->name('game_next_edit.edit');
    Route::GET('/game_next_edit/show/{id}', [GameNextEditController::class, 'show'])->name('game_next_edit.show');
    Route::GET('/game_next_edit/show_next/{prev_id}', [GameNextEditController::class, 'show_next'])->name('game_next_edit.show_next');
    Route::POST('/game_next_edit/update/{prev_id}', [GameNextEditController::class, 'update'])->name('game_next_edit.update');
    Route::DELETE('/game_next_edit/delete/{id}', [GameNextEditController::class, 'delete'])->name('game_next_edit.delete');

});





require __DIR__.'/auth.php';
