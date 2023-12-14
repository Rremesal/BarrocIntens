<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MaintencanceAppointemtsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/privacyverklaring', function(){
    return view('privacy');
})->name('privacy');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/fullcalendar',[MaintencanceAppointemtsController::class, "fullcalendar"]);
    Route::resource('/calendar', CalendarController::class);
    Route::get('/fullcalendar/create', [CalendarController::class, 'create'])->name('fullcalendar.create');
    Route::post('/fullcalendar/store', [CalendarController::class, 'store'])->name('fullcalendar.store');

});

// Route::resource('/machines', ); // hier moet nog de Controller voor de (koffie) machines mee worden gegeven aan de resource functie


require __DIR__.'/auth.php';
