<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::inertia('/', 'Welcome')->name('home');
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/create', [StudentController::class, 'create'])
    ->name('student.create');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
