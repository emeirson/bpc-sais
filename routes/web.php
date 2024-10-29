<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramCoursesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('colleges', CollegeController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('students', StudentController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('academic-years', AcademicYearController::class);
    Route::resource('semesters', SemesterController::class);
    Route::resource('sections', SectionController::class);
    Route::get('programs/{program}/courses', [ProgramCoursesController::class, 'edit'])->name('program-courses.edit');
    Route::patch('programs/{program}/courses', [ProgramCoursesController::class, 'update'])->name('program-courses.update');
});
