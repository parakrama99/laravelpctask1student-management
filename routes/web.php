<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('students.index');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// to store data
Route::post('/students/create', [StudentController::class, 'store'])->name('students.store');


// Show the form for editing an existing student
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Update an existing student in storage after editing
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');


// Display a single student's details/view
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');


// Remove a student from storage
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');