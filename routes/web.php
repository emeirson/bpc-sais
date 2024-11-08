<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\ClassCourseController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramCoursesController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\YearLevelController;
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
    Route::resource('rooms', RoomController::class);
    Route::resource('year-levels', YearLevelController::class);
    Route::resource('class-course', ClassCourseController::class);
    Route::get('class-course/{class_course}/students', [ClassCourseController::class, 'students'])->name('class-course.students');
    Route::get('programs/{program}/courses', [ProgramCoursesController::class, 'edit'])->name('program-courses.edit');
    Route::resource('enrollment', EnrollmentController::class);
    Route::get('enrollment/create/{student}', [EnrollmentController::class, 'create'])->name('enrollment.create');
    Route::get('enrollment/store/{student}', [EnrollmentController::class, 'store'])->name('enrollment.store');
    Route::patch('programs/{program}/courses', [ProgramCoursesController::class, 'update'])->name('program-courses.update');
});
