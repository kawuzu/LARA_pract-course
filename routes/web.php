<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\LostReportController;
use App\Http\Controllers\EventController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/search', [\App\Http\Controllers\PageController::class, 'search'])->name('animals.search');

Route::get('/animals', [PageController::class, 'animals'])->name('animals.index');
Route::get('/animals/{animal}', [PageController::class, 'animalShow'])->name('animals.show');

Route::get('/advices', [PageController::class, 'advices'])->name('advices.index');

Route::get('/stories', [PageController::class, 'stories'])->name('stories.index');
Route::get('/stories/{story}', [\App\Http\Controllers\PageController::class, 'storyShow'])->name('stories.show');

Route::get('/lost-reports', [LostReportController::class, 'index'])->name('lost_reports.index');
Route::post('/lost-reports', [LostReportController::class, 'store'])->name('lost_reports.store');

Route::get('/events', [PageController::class, 'events'])->name('events.index');
Route::get('/events/calendar', [EventController::class, 'calendar'])->name('events.calendar');
Route::get('/events/filter', [EventController::class, 'filter'])->name('events.filter');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/register', [EventController::class, 'register'])->middleware('auth')->name('events.register');

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('animals', AdminAnimalController::class);
});

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/password', [\App\Http\Controllers\ProfileController::class, 'password'])
        ->name('profile.password');

    Route::post('/avatar', [\App\Http\Controllers\ProfileController::class, 'avatar'])
        ->name('profile.avatar');
});

