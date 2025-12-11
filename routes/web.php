<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;

/*
|--------------------------------------------------------------------------
| Страницы
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/animals', [PageController::class, 'animals'])->name('animals.index');
Route::get('/animals/{animal}', [PageController::class, 'animalShow'])->name('animals.show');

Route::get('/events', [PageController::class, 'events'])->name('events.index');

Route::get('/advices', [PageController::class, 'advices'])->name('advices.index');
Route::get('/stories', [PageController::class, 'stories'])->name('stories.index');

// Потеряшки / найденыши

use App\Http\Controllers\LostReportController;

Route::get('/lost-reports', [LostReportController::class, 'index'])->name('lost_reports.index');
Route::post('/lost-reports', [LostReportController::class, 'store'])->name('lost_reports.store');


// дэшборд для авторизованных
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// админские страницы
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('animals', AdminAnimalController::class);
});


// Профиль
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/password', [\App\Http\Controllers\ProfileController::class, 'password'])
        ->name('profile.password');
});
