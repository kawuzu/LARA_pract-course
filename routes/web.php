<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/animals', [PageController::class, 'animals'])->name('animals.index');
Route::get('/animals/{animal}', [PageController::class, 'animalShow'])->name('animals.show');

Route::get('/events', [PageController::class, 'events'])->name('events.index');

Route::get('/advices', [PageController::class, 'advices'])->name('advices.index');
Route::get('/stories', [PageController::class, 'stories'])->name('stories.index');

// Dashboard for authenticated users (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Admin routes group — защита: auth + role:admin
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('animals', AdminAnimalController::class);
});
