<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\LostReportController;
use App\Http\Controllers\EventController;
/*
|--------------------------------------------------------------------------
| Страницы
|--------------------------------------------------------------------------
*/
//главная
Route::get('/', [PageController::class, 'home'])->name('home');
// поиск животных с фильтром по местоположению
Route::get('/search', [\App\Http\Controllers\PageController::class, 'search'])->name('animals.search');


//приютить
Route::get('/animals', [PageController::class, 'animals'])->name('animals.index');
Route::get('/animals/{animal}', [PageController::class, 'animalShow'])->name('animals.show');

//советы
Route::get('/advices', [PageController::class, 'advices'])->name('advices.index');

//ваши истории
Route::get('/stories', [PageController::class, 'stories'])->name('stories.index');
Route::get('/stories/{story}', [\App\Http\Controllers\PageController::class, 'storyShow'])->name('stories.show');


// Потеряшки / найденыши
Route::get('/lost-reports', [LostReportController::class, 'index'])->name('lost_reports.index');
Route::post('/lost-reports', [LostReportController::class, 'store'])->name('lost_reports.store');

//наши мероприятия
Route::get('/events', [PageController::class, 'events'])->name('events.index');
Route::get('/events/calendar', [EventController::class, 'calendar'])->name('events.calendar');
Route::get('/events/filter', [EventController::class, 'filter'])->name('events.filter');

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
use App\Http\Controllers\ProfileController;

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('/avatar', [ProfileController::class, 'avatar'])->name('profile.avatar');
});


